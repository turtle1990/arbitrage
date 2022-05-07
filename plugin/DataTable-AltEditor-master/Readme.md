# JQuery Datatables Editor - Alternative to the official one

Add capabilities to add, edit and delete rows in your datatables through the use of modals.

Inline editing is not supported (so far).

## Basic usage

Include in the project the libraries:

1. jQuery
2. [Bootstrap](https://getbootstrap.com/) > 4.0 **or** [Foundation](https://get.foundation/) > 6.0
3. [jquery.dataTables](https://datatables.net/), [dataTables.buttons](https://datatables.net/extensions/buttons/), [dataTables.select](https://datatables.net/extensions/select/)

Define a DataTable as usual.

Pass to the DataTable constructor at least the following arguments: `dom`, `select`, `buttons`, `altEditor: true` (see the examples).

_Bootstrap or Foundation is necessary for action buttons and modals._

## Examples

There are some examples in the folder `example`, for different use cases:

- a DataTable populated and maintained via Javascript, (no AJAX, no databases), with data organized in rows;

- a DataTable populated and maintained via Javascript, (no AJAX, no databases), with data organized in objects;

- a DataTable populated via AJAX, to be used in connection with a databases, with data organized in objects.

Examples can be browsed at <https://luca-vercelli.github.io/DataTable-AltEditor> .

## AJAX Setup

The datatable accepts the following callback functions as arguments:

```
onAddRow(alteditor, rowdata, success, error)
onEditRow(alteditor, rowdata, success, error, originalrowdata)
onDeleteRow(alteditor, rowdata, success, error)
```

In the most common case, these function should call `$.ajax` as expected by the webservice. The two functions `success` and `error` should be passed as arguments to `$.ajax`.

Within the procedures `onAddRow`, `onEditRow`, `onDeleteRow`, you can access datatable object using `alteditor.s.dt`.

Webservice **must** return the modified row in JSON format, because the `success()` function expects this. Otherwise you have to write your own `success()` callback (e.g. refreshing the whole table).

## Row Key

There is no default key in the table. Inside your callback functions, probably you will need a row key to build URL's, in that case you can get them from the `rowdata` parameter.

## Column ID

Please always keep in mind that DataTable framework allows two different kinds of "rows": Arrays and Objects. In first case columns are indexed through integers; in second case columns are indexed by their attribute name. Usually JSON's use the Object approach, but we cannot be sure.

## Column Modifiers, and Validation

Following column options are supported.

Column option                                   | Accepted values                                    | Description
----------------------------------------------- | -------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------
`type`                                          | `"text" \| "select" \| "hidden" \| ...`            | Type of HTML input to be shown. The value `readonly` is accepted for backward compatibility, but deprecated.
`readonly`                                      | `true \| false`                                    | Add `readonly` HTML attribute
`disabled`                                      | `true \| false`                                    | Add `disabled` HTML attribute
`required`                                      | `true \| false`                                    | Add `required` HTML attribute
`hoverMsg`                                      | `"some msg"`                                       | The message will appear as a tooltip over the input field.
`unique`                                        | `true \| false`                                    | Ensure that no two rows have the same value. The check is performed client side, not server side. Set HTML `"data-unique"` attribute. (Probably there's some issue with this).
`uniqueMsg`                                     | `"some msg"`                                       | An error message that is displayed when the unique constraint is not respected. Set HTML `"data-uniqueMsg"` attribute.
`special`                                       | `"any string"`                                     | Set HTML `"data-special"` attribute (don't know what's that needed for).
`style`                                         | `"any string"`                                     | Set HTML `"style"` attribute.
`editorOnChange`                                | function                                           | Custom onchange function. It will take as arguments the jquery event and the altEditor object.
`value`											| `"some value"`									 | Set default value for add modal. Actual value used for edit modal
**Options for columns with type `"text"`:**     |                                                    |
`pattern`                                       | `r.e.`                                             | The typed text will be matched against given regular expression, before submit.
`hoverMsg`                                      | `"some msg"`                                       | An error message is displayed in case `"pattern"` is not matched. It will be the same tooltip message.
`maxLength`                                     | `integer`                                          | Set HTML `"maxlength"` attribute.
`datepicker`                                    | `{}`                                               | Enable a datepicker component. jQuery-UI plugin must be linked. More datepicker configuration options may be passed within the object.
`datetimepicker`                                | `{}`                                               | Enable a datetimepicker component. jQuery datetimepicker plugin must be linked. More datetimepicker configuration options may be passed within the object.
**Options for columns with type `"select"`:**   |                                                    |
`options`                                       | `["a", "b", "c"]` or `{"a":"A", "b":"B", "c":"C"}` | The options that shall be presented.
`select2`                                       | `{}`                                               | Enable a select2 component. Select2 jQuery plugin must be linked. More select2 configuration options may be passed within the object.
`multiple`                                      | `true \| false`                                    | Set HTML `"multiple"` attribute.
`optionsSortByLabel`                            | `true \| false`                                    | Allows select to be sorted by label field.
**Options for columns with type `"textarea"`:** |                                                    |
`rows`                                          | `integer`                                          | Set HTML `"rows"` attribute.
`cols`                                          | `integer`                                          | Set HTML `"cols"` attribute.
**Options for columns with type `"date"`:**     |                                                    |
`dateFormat`                                    | `"YYYY-MM-DD"`                                     | Set date format. Require moment.js library linked.
**Options for columns with type `"number"`**		|													 |	
`step`											| `float`											 | Set HTML `"step"` attribute
`min`											| `float`											 | Set HTML `"min"` attribute
`max`											| `float`											 | Set HTML `"max"` attribute

# Global Modifiers

Following DataTable options are supported.

DataTable option      | Accepted values | Description
--------------------- | --------------- | ----------------------------
`altEditor`           | `true \| false` | Enable editor. Default false.
`onAddRow`            | function        | On-add callback function.
`onEditRow`           | function        | On-edit callback function.
`onDeleteRow`         | function        | On-delete callback function.
`closeModalOnSuccess` | `true \| false` | Close modal after successful edit/add/delete. Default true.
`encodeFiles` | `true \| false` | Encode files to Base64 format. Default true.

## Credits

See LICENSE and CHANGELOG for various credits.
