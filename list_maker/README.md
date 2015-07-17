# List-Maker

This plugin creates HTML lists from plain text data, and
optionally accepts user-defined delimiters.

## Usage

### `{exp:list_maker}`

#### Example Usage

```
{exp:list_maker}
    This is one item
    This is another item
    And this is another
{/exp:list_maker}

```

would output the following HTML:

```
    <ul class="list">
        <li>This is one item</li>
        <li>This is another item</li>
        <li>And this is another</li>
    </ul>
```

#### Parameters

##### type

(ul/ol) (unordered list) or "ol" (ordered list). Default for type is an unordered list

##### separator

`newline` (hard returns) or any character such as `|`, `^`, `+`, etc. Default for separator is a newline (hard return).

##### id

allows you to specify an id attribute. No default value.

##### class

allows you to specify a class attribute. Default is `list`.

## Change Log

### 2.0

- Updated plugin to be 3.0 compatible

### 1.1

- Updated plugin to be 2.0 compatible
