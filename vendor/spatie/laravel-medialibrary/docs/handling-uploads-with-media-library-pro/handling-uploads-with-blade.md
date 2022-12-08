---
title: Handling uploads with Blade 
weight: 4
---

You can make use of the `x-media-library-attachment` and `x-media-library-collection` Blade components to handle uploads.

## Getting started

The Blade components that handle uploads leverage [Livewire](https://laravel-livewire.com) under the hood. That's why
you must follow [Livewire's installation instructions](https://laravel-livewire.com/docs/installation) as well.

## Handling a single upload

You can use `x-media-library-attachment` to upload a single file. Here's an example:

```html
<form method="POST">
    @csrf

    <input id="name" name="name">

    <x-media-library-attachment name="avatar"/>

    <button type="submit">Submit</button>
</form>
```

![Screenshot of the attachment component](/docs/laravel-medialibrary/v9/images/pro/attachment.png)

The `x-media-library-attachment` will take care of the upload. Under the hood the upload is processed by
a [Livewire](https://laravel-livewire.com) component.

After a file has been uploaded it will be stored as a temporary upload. In case there are validation errors when
submitting the form, the `x-media-library-attachment` will display the temporary upload when you get redirected back to
the form. There's no need for the user to upload the file again.

In the controller handling the form submission you should validate the temporary upload and transfer it to an Eloquent
model. You can read more on that [on this page](/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/processing-uploads-on-the-server).

## Handling multiple uploads

Here's an example of how you can allow multiple uploads

```html
<form method="POST">
    @csrf
    Name: <input type="text" name="name" value="{{ old('name', $formSubmission->name) }}">

    <x-medialibrary-attachment multiple name="images"/>

    <button type="submit">Submit</button>
</form>
```

![Screenshot of the attachment component](/docs/laravel-medialibrary/v9/images/pro/multiple.png)

After files have been uploaded, they will be stored as a temporary uploads.

In the controller handling the form submission you should validate the temporary upload and transfer it to an Eloquent
model. You can read more on that [on this page](/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/processing-uploads-on-the-server).

## Setting a maximum amount of uploads

To set a maximum number of files you can add a `max-items` attribute. Here is an example where users can only upload two
files.

```html
<x-media-library-attachment 
    multiple
    name="images"
    max-items="2"
/>
```

## Validating uploads in real time

The upload can be validated before the form is submitted by adding a `rules` attribute. In the value of the attribute
you can use any of Laravel's available validation rules that are applicable to file uploads.

Here's an example where we only accept `png` and `jpg` files that are 1MB or less.

```html
<x-media-library-attachment 
    multiple
    name="images"
    max-items="2"
    rules="mimes:png,jpg|max:1024"
/>
```

This validation only applies on the creation of the temporary uploads. You should also perform validation
when [processing the upload on the server](/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/processing-uploads-on-the-server).

## Administer the contents of a media library collection

You can manage the entire contents of a media library collection with `x-media-library-collection` component. This
component is intended to use in admin sections.

Here is an example where we are going to administer an `images` collection of a `$blogPost` model. We assume that you
already [prepared the model](/docs/laravel-medialibrary/v9/basic-usage/preparing-your-model) to handle uploads.

```html
<x-media-library-collection
    name="images"
    :model="$blogPost"
    collection-name="images"
/>
```

This component will display the contents of the entire collection. Files can be added, removed, updated and reordered.
New files will be uploaded as temporary uploads.

The value you pass in `name` of the component will be use as the key name in which the component will send the state of
the collection to the backend. In the controller handling the form submission you should validate the new contents of
the collection and sync it with the collection of the eloquent model. You can read more on that [on this page](/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/processing-uploads-on-the-server).

Like the `x-media-library-attachment` component, the `x-media-library-collection` accepts `max-items` and `rules` props.

In this example, the collection will be allowed to hold `png` and `jpg` files that are smaller than 1 MB.

```html
<x-media-library-collection
    name="images"
    :model="$blogPost"
    collection-name="images"
    max-items="2"
    rules="mimes:png,jpg|max:1024"
/>
```

### Using custom properties

The media library supports [custom properties](/docs/laravel-medialibrary/v9/advanced-usage/using-custom-properties) to be saved on a media item. By
default, the  `x-media-library-collection` component doesn't show the custom properties. To add them you should create a
blade view that will be used to display all form elements on a row in the component.

In this example we're going to add a custom property form field called `extra_field`.

```html
@include('media-library::livewire.partials.collection.fields')

<div class="media-library-field">
    <label class="media-library-label">Extra field</label>
    <input
        class="media-library-input"
        type="text"
        {{ $mediaItem->customPropertyAttributes('extra_field')  }}
    />

    @error($mediaItem->customPropertyErrorName('extra_field'))
        <span class="media-library-text-error">
               {{ $message }}
        </span>
    @enderror
</div>
```

You should then pass the path to that view to the `fields-view` prop of the `x-media-library-collection` component.

```html
<x-media-library-collection
    name="images"
    :model="$formSubmission"
    collection="images"
    fields-view="app.your-custom-properties-blade-view-path"
/>
```

This is how that will look like.

![Screenshot of custom property](/docs/laravel-medialibrary/v9/images/pro/extra.png)


Custom properties can be validated using [a form request](/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/processing-uploads-on-the-server).

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class BlogPost extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
}
```

## Uploading directly to S3

Under the hood, the `attachment` and `collection` components use Livewire to perform uploads. Currently, Livewire does not support uploading multiple files to S3. That's why only the `attachment` component can be used to upload files to S3.

To get started with upload files to `s3`, make sure to follow Livewire's instructions on [how to upload directly to S3](https://laravel-livewire.com/docs/2.x/file-uploads#upload-to-s3). 

Next, make sure you configured the media disk that uses the S3 driver. 

With that configuration in place, the `attachment` component will now upload directly to S3.


