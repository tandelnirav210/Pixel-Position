<x-layout>
    <x-page-heading>New Job</x-page-heading>
    <x-forms.form method="POST" action="/jobs">
        <x-forms.input name="title" label="Title" />
        <x-forms.input name="salary" label="Salary" placeholder="$10,000 USD" />
        <x-forms.input name="location" label="Location" placeholder="San Francisco, CA" />

        <x-forms.select name="schedule" label="Schedule">
            <option selected value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://example.com" />
        <x-forms.checkbox label="Feature(Costs Extra)" name="featured" />
        <x-forms.input label="Tags (Comma separeted)" name="tags" placeholder="laracast, php, javascript" />

        <x-forms.divider />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
