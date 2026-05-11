<?php

namespace App\Filament\Concerns;

use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Spatie\Translatable\HasTranslations;

trait HasTranslatableForm
{
    #[Url(as: 'lang')]
    public ?string $activeLocale = null;

    /**
     * @return array<string, string>
     */
    protected function getTranslatableLocales(): array
    {
        return [
            'tr' => 'Türkçe',
            'en' => 'English',
        ];
    }

    protected function getDefaultActiveLocale(): string
    {
        return array_key_first($this->getTranslatableLocales());
    }

    /**
     * @return array<int, Action>
     */
    protected function getLocaleSwitcherActions(): array
    {
        $actions = [];
        foreach ($this->getTranslatableLocales() as $code => $label) {
            $actions[] = Action::make('switch_locale_'.$code)
                ->label($label)
                ->icon(Heroicon::Language)
                ->color(fn (): string => $code === ($this->activeLocale ?? $this->getDefaultActiveLocale()) ? 'primary' : 'gray')
                ->dispatchSelf('translatable-form::switch-locale', ['locale' => $code]);
        }

        return $actions;
    }

    #[On('translatable-form::switch-locale')]
    public function onTranslatableLocaleSwitch(string $locale): void
    {
        $this->switchLocale($locale);
    }

    public function switchLocale(string $locale): void
    {
        if (! array_key_exists($locale, $this->getTranslatableLocales())) {
            return;
        }

        $this->activeLocale = $locale;

        if (method_exists($this, 'fillForm')) {
            $this->fillForm();
        }
    }

    /**
     * @return array<int, string>
     */
    protected function resolveTranslatableAttributes(?Model $record = null): array
    {
        $record ??= method_exists($this, 'getRecord') ? $this->getRecord() : null;

        if ($record === null) {
            $modelClass = static::getResource()::getModel();
            $record = new $modelClass;
        }

        if (! in_array(HasTranslations::class, class_uses_recursive($record), true)) {
            return [];
        }

        return $record->getTranslatableAttributes();
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function fillTranslatableData(array $data): array
    {
        $this->activeLocale ??= $this->getDefaultActiveLocale();

        $record = method_exists($this, 'getRecord') ? $this->getRecord() : null;

        if ($record === null) {
            return $data;
        }

        foreach ($this->resolveTranslatableAttributes($record) as $attribute) {
            $data[$attribute] = $record->getTranslation($attribute, $this->activeLocale, false);
        }

        return $data;
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function persistTranslatableData(array $data): array
    {
        $record = method_exists($this, 'getRecord') ? $this->getRecord() : null;

        if ($record === null) {
            return $data;
        }

        foreach ($this->resolveTranslatableAttributes($record) as $attribute) {
            if (! array_key_exists($attribute, $data)) {
                continue;
            }

            $record->setTranslation($attribute, $this->activeLocale, $data[$attribute]);
            $data[$attribute] = $record->getTranslations($attribute);
        }

        return $data;
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function wrapTranslatableDataForCreate(array $data): array
    {
        $this->activeLocale ??= $this->getDefaultActiveLocale();

        $modelClass = static::getResource()::getModel();
        $instance = new $modelClass;

        foreach ($this->resolveTranslatableAttributes($instance) as $attribute) {
            if (! array_key_exists($attribute, $data)) {
                continue;
            }

            $data[$attribute] = [$this->activeLocale => $data[$attribute]];
        }

        return $data;
    }
}
