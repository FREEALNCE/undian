---
title: Handling uploads with React
weight: 6
---

Media Library Pro provides beautiful UI components for React. They pack a lot of features: temporary uploads, custom property inputs, frontend validation, and robust error handling.

The `MediaLibraryAttachment` component can upload one or more files with little or no extra information. The attachment component is a lightweight solution for small bits of UI like avatar fields.

![Screenshot of the MediaLibraryAttachment React component](/docs/laravel-medialibrary/v9/images/pro/attachment.png)

The `MediaLibraryCollection` component can upload multiple files with custom properties. The collection component shines when you need to manage media, like in backoffices.

![Screenshot of the MediaLibraryCollection React component](/docs/laravel-medialibrary/v9/images/pro/collection.png)

If neither of these fit the bill, we've exposed a set of APIs for you to be bold and [roll your own components](#).

## Basic setup

First, the server needs to be able to catch your incoming uploads. Use the `temporaryUploads` macro in your routes file.

```php
// Probably routes/web.php
Route::temporaryUploads();
```

The macro will register a route on `/media-library-uploads`, which is used by the React components by default. If you wish to use a different endpoint, just pass the desired
url to the macro.

```php
// Probably routes/web.php
Route::temporaryUploads('your-url');
```

### Customizing the upload endpoint

The React components post data to `/media-library-uploads` by default. If you registered the controller on a different URL, pass it to the `uploadEndpoint` prop of your React components.

```jsx
<MediaLibraryAttachment name="avatar" uploadEndpoint="temp-upload" />
```

### Importing the components

The components aren't available through npm, but are located in `vendor/spatie/laravel-medialibrary-pro/resources/js` when you install the package through Composer. This makes for very long import statements, which you can clean up by adding some configuration to your Webpack/Laravel Mix configuration:

**laravel-mix >6**

```js
// webpack.mix.js

mix.override((webpackConfig) => {
    webpackConfig.resolve.modules = [
        "node_modules",
        __dirname + "/vendor/spatie/laravel-medialibrary-pro/resources/js",
    ];
}
```

**laravel-mix <6**

```js
// webpack.mix.js

mix.webpackConfig({
    resolve: {
        modules: [
            "node_modules",
            __dirname + "/vendor/spatie/laravel-medialibrary-pro/resources/js",
        ],
    },
});
```

This will force Webpack to look in `vendor/spatie/laravel-medialibrary-pro/resources/js` when resolving imports, and allows you to shorten your import to this:

```js
import MediaLibraryAttachment from "media-library-pro-react-attachment";
```

If you're using TypeScript, you will also have have to add this to your tsconfig:

```json
// tsconfig.json

{
    "compilerOptions": {
        "paths": {
            "*": ["vendor/spatie/laravel-medialibrary-pro/resources/js/*"]
        }
    }
}
```

## Your first components

The most basic components have a `name` prop. This name will be used to identify the media when it's uploaded to the server.

```jsx
// MyImageUploader.jsx

import MediaLibraryAttachment from "media-library-pro-react-attachment";
import MediaLibraryCollection from "media-library-pro-react-collection";

export default function MyImageUploader() {
    return (
        <form>
            <MediaLibraryAttachment name="avatar" />
            <MediaLibraryCollection name="downloads" />

            <button>Submit</button>
        </form>
    );
}
```

### Passing an initial value

If your form modifies an existing set of media, you may pass it through in the `initialValue` prop.

You can retrieve your initial values in Laravel using `$yourModel->getMedia($collectionName);`, this will also take care of any `old` values after an invalid form submit.

```jsx
<form>
    <MediaLibraryAttachment name="avatar" initialValue={avatar} />
    <MediaLibraryCollection name="downloads" initialValue={downloads} />

    <button>Submit</button>
</form>
```

Under the hood, these components create hidden `<input />` fields to keep track of the form values on submit. If you would like to submit your values asynchronously, refer to the `Asynchronously submit data` section.

### Setting validation rules

You'll probably want to validate what gets uploaded. Use the `validationRules` prop, and don't forget to pass Laravel's validation errors too. The validation errors returned from the server will find errors under the key used in your `name` prop.

```jsx
<form>
    <MediaLibraryAttachment
        name="avatar"
        initialValue={avatar}
        validationRules={{
            accept: ["image/png", "image/jpeg"],
            maxSizeInKB: 5000,
        }}
        validationErrors={validationErrors}
    />

    <MediaLibraryCollection
        name="downloads"
        initialValue={downloads}
        validationRules={{
            accept: ["image/png", "image/jpeg"],
            maxSizeInKB: 5000,
        }}
        validationErrors={validationErrors}
    />

    <button>Submit</button>
</form>
```

You can also set the maximum amount of images that users can be uploaded using the `max-items` prop. Don't forget to set the `multiple` prop for the attachment component.

```jsx
<form>
    <MediaLibraryAttachment name="files" maxItems={2} multiple />
    <MediaLibraryCollection name="downloads" maxItems={5} />

    <button>Submit</button>
</form>
```

See the [Validation rules section](#validation-rules) for a complete list of all possible validation rules.

### Checking the upload state

The components keep track of whether they're ready to be submitted, you can use this to disable a submit button while a file is still uploading or when there are frontend validation errors. This value can be tracked by passing a listener method to the `onIsReadyToSubmitChange` prop. If you submit a form while a file is uploading, Laravel will return a HTTP 500 error with an `invalid uuid` message.

```jsx
import MediaLibraryAttachment from "media-library-pro-react-attachment";

function AvatarComponent() {
    const [isReadyToSubmit, setIsReadyToSubmit] = useState(true);

    return(
        <MediaLibraryAttachment
            name="avatar"
            onIsReadyToSubmitChange={setIsReadyToSubmit}
        />

        <button disabled={!isReadyToSubmit} onClick={submit}>Submit</button>
    )
}
```

### Using custom properties

The Media Library supports [custom properties](/docs/laravel-medialibrary/v9/advanced-usage/using-custom-properties) to be saved on a media item. The values for these can be chosen by your users. By default, the `MediaLibraryAttachment` component doesn't show any input fields, and the `MediaLibraryCollection` component only shows a `name` field, with the option to add more fields.

Use the `fieldsView` render prop to add some fields:

```jsx
<MediaLibraryCollection
    name="images"
    initialValue={images}
    fieldsView={({
        getCustomPropertyInputProps,
        getCustomPropertyInputErrors,
        getNameInputErrors,
        getNameInputProps,
    }) => (
        <div className="media-library-properties">
            <div className="media-library-field">
                <label className="media-library-label">Name</label>
                <input
                    className="media-library-input"
                    {...getNameInputProps()}
                />

                {getNameInputErrors().map((error) => (
                    <p key={error} className="media-library-text-error">
                        {error}
                    </p>
                ))}
            </div>

            <div className="media-library-field">
                <label className="media-library-label">Extra field</label>
                <input
                    className="media-library-input"
                    {...getCustomPropertyInputProps("extra_field")}
                />

                {getCustomPropertyInputErrors("extra_field").map((error) => (
                    <p key={error} className="media-library-text-error">
                        {error}
                    </p>
                ))}
            </div>
        </div>
    )}
/>
```

When you add an image to your collection, it will look like this.

![Screenshot of custom property](/docs/laravel-media-library/v9/images/pro/extra.png)

### Customizing the file properties

When uploading a file, some properties appear by default: its extension, filesize and a remove or download button (respectively for the attachment or collection component).

You can customize what is displayed here by using the `propertiesView` scoped slot:

```jsx
<MediaLibraryAttachment
    name="images"
    initialValue={images}
    fieldsView={({ object }) => (
        <div className="media-library-property">{object.attributes.name}</div>
    )}
/>
```

### Asynchronously submit data

If you don't want to use traditional form submits to send your data to the backend, you will have to keep track of the current value of the component using the `onChange` handler. The syntax is the same for all UI components:

```jsx
import Axios from 'axios';

export function AvatarForm({ values }) {
    const [media, setMedia] = React.useState(values.media);
    const [validationErrors, setValidationErrors] = React.useState({});

    function submitForm() {
        Axios
            .post('endpoint', { media })
            .catch(error => setValidationErrors(error.data.errors));
    }

    return (
        <>
            <MediaLibraryAttachment
                …
                validationErrors={validationErrors}
                onChange={setMedia}
            />

            <button onClick={submitForm}>Submit</button>
        </>
    );
}
```

### Using with Laravel Vapor

If you are planning on deploying your application to AWS using [Laravel Vapor](https://vapor.laravel.com/), you will need to pass `{ enabled: true }` for the optional `vapor` prop to your components so your files can be uploaded to an S3 bucket.

When uploading a file, the component will first get a signed storage URL from Vapor. By default, its value is `'/vapor/signed-storage-url'`. If you changed it in Laravel, you can override it by setting a value for `vapor.signedStorageUrl`.

After uploading the file to S3, the component will notify your application of where the file was stored. For this, you need to register the Media Library S3 uploads controller in your routes file: `Route::mediaLibraryS3Uploads('media-library-post-s3');`. The components expect this endpoint to be `/media-library-post-s3`, if you chose a different endpoint, set it in `vapor.postS3Endpoint`.

```jsx
<MediaLibraryAttachment
    name="media"
    vapor={{
        enabled: true,
        signedStorageUrl: "/vapor/signed-storage-url",
        postS3Endpoint: "media-library-post-s3",
    }}
/>
```

## Validation rules

There are a couple of different ways to validate files on the frontend. These props are available to you: `validationRules`, `maxItems` and `beforeUpload`.

**validationRules**

In the `validationRules` object, we've got the `accept` property, which expects an array of MIME types as strings. Leave it empty to accept all types of files, set its value to `['image/*']` to accept any type of image, or choose your own set of rules using [MIME types](https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types). Remember, the only valid MIME type of a JPEG/JPG is `image/jpeg`!

The `minSizeInKB` and `maxSizeInKB` properties set the minimum and maximum size of any individual file.

```jsx
<MediaLibraryAttachment
    name="avatar"
    validationRules={{
        accept: ["image/jpeg", "image/gif", "application/pdf"],
        minSizeInKB: 512,
        maxSizeInKB: 512,
    }}
/>
```

**maxItems**

Set the maximum amount of items in the collection/attachment component at any time.

```jsx
<MediaLibraryAttachment name="avatar" maxItems={3} />
```

**beforeUpload**

Pass a method to `beforeUpload` that accepts a [file](https://developer.mozilla.org/en-US/docs/Web/API/File) parameter. Return any value (or resolve a Promise with any value) from this function to upload the file. Throw an Error in this function to cause the file not to be uploaded, and display your error message.

```jsx
function checkFileValidity(file) {
    return new Promise((resolve) => {
        if (file.size < 1000) {
            return resolve();
        }

        throw new Error("The uploaded file is too big");
    });
}

return (
    <MediaLibraryAttachment name="avatar" beforeUpload={checkFileValidity} />
);
```

## Props

These props are available on both the `attachment` and the `collection` component.

| prop name                | Default value                                         | Description                                                                                                                                                                       |
| ------------------------ | ----------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| name                     |                                                       |                                                                                                                                                                                   |
| initialValue             | `[]`                                                  |                                                                                                                                                                                   |
| uploadEndpoint           | `"media-library-uploads"`                   |                                                                                                                                                                                   |
| validationRules          |                                                       | Refer to [validation](#validation-rules) section                                                                                                                                  |
| validationErrors         |                                                       | The standard Laravel validation error object                                                                                                                                      |
| multiple                 | `false` (always `true` in the `collection` component) | Only exists on the `attachment` components                                                                                                                                        |
| maxItems                 | `1` when `multiple` = `false`, otherwise `undefined   |                                                                                                                                                                                   |
| vapor                    |                                                       | Set to true if you will deploy your application to Vapor. This enables uploading of the files to S3.                                                                              |
| maxSizeForPreviewInBytes | `5242880` (5 MB)                                      | When an image is added, the component will try to generate a local preview for it. This is done on the main thread, and can freeze the component and/or page for very large files |
| sortable                 | `true`                                                | Only exists on the `collection` components. Allows the user to drag images to change their order, this will be reflected by a zero-based `order` attribute in the value           |
| setMediaLibrary          |                                                       | Used to set a reference to the MediaLibrary instance, so you can change the internal state of the component.                                                                      |
| beforeUpload             |                                                       | A method that is run right before a temporary upload is started. You can throw an `Error` from this function with a custom validation message                                     |
| afterUpload              |                                                       | A method that is run right after a temporary upload has completed, `{ success: true, uuid }`                                                                                      |
| onChange                 |                                                       |                                                                                                                                                                                   |
| onIsReadyToSubmitChange  |                                                       | Refer to [Checking the upload state](#checking-the-upload-state) section                                                                                                          |
