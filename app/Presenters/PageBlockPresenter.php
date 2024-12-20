<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;
use File;

class PageBlockPresenter extends Presenter
{


    public function blockEID()
    {

        return $this->block_uid;
    }


    public function blockTemplate($type = "display")
    {

        $tmpl =  $this->block_lid . '.' . $type;

        return $tmpl;
    }

    public function item_uid()
    {
        // get item_uid
        //if not null, return
        // else create then retrun
    }



    /*
     *
     * RETURNS - A formated block title or block title if empty.
     *
     */

    public function anchor($type = '', $index = '')
    {
        $str = '';

        switch ($type) {
            case 'id':
                $str = $this->stringToURI($this->block_name, '-');
                break;

            case 'link':
                $str = '<li class="nav-item">
					<a class="nav-link" href="#' . $this->stringToURI($string, '-') . '">' . $this->block_name . '</a>
				</li>';
                break;

            case 'anchor':
                $str = '<div id="' . $this->stringToURI($this->block_name, '-') . '" style="position:relative;top:-150px;"></div>';
                break;

            case 'content':
                $str = $this->stringToURI($this->content('heading', $index), '-');
                $str = $this->numbersToWords($str);
                break;

            default:
                $str = $this->stringToURI($this->numbersToWords($this->block_name), '-');
                break;
        }

        return $str;
    }

    private function numbersToWords($str)
    {

        $search  = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $replace = array('-zero-', '-one-', '-two-', '-three-', '-four-', '-five-', '-six-', '-seven-', '-eight-', '-nine-');
        $str = str_replace($search, $replace, $str);
        $str = str_replace('--', '-', $str);

        return trim($str ?? '', '-');
    }

    private function stringToURI($url, $seperator = '+')
    {

        $url = preg_replace('~[^\\pL0-9_]+~u', $seperator, $url);
        $url = trim($url ?? '', "-");
        $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~', $seperator, $url);

        return $url;
    }


    public function ischecked($val)
    {
        if ($val == 1) {
            return 'checked';
        }
        return;
    }


    public function contentIsTrueFalse($attr, $true, $false = '')
    {

        $val = $this->content($attr);

        if (isset($val) && $val == 1) {
            return $true;
        }

        return $false;
    }


    public function setActiveClass($index)
    {

        if ($index == 0) {
            return 'active';
        }

        return 'index-' . $index;
    }


    public function getBlockIcon()
    {

        $path = '/storage/blocks/';

        if ($this->library !== null) {
            // $this is a block
            $path .= $this->library->block_theme . '/';
            $path .= $this->library->block_template . '/';
        } else {
            // $this is a library block
            $path .= $this->block_theme . '/';
            $path .= $this->block_template . '/';
        }
        $path .= 'icon.svg';
        \Log::debug($path);

        return asset($path);
    }

    function flatten_array($arg)
    {

        return array_filter(
            array_unique(
                is_array($arg) ? array_reduce($arg, function ($c, $a) {
                    return array_merge($c, $this->flatten_array($a));
                }, []) : [$arg]
            )
        );
    }


    public function getBlockScriptTag($domain = "admin", $type = "js", $url = true)
    {

        $arr = [];

        $file_path = $this->getTemplateBlockPath() . '/' . $domain . '/';

        $exists = File::exists($file_path);

        if ($exists) {
            foreach (File::files($file_path) as $filename) {
                $file = $filename->getPathname();
                $ext = $filename->getExtension();

                if ($url === true) {
                    $file = url($file);
                };

                if ($type == $ext) {
                    switch ($type) {
                        case 'css':
                            $arr[] = '<link rel="stylesheet" href="' . $file . '"/>';
                            break;

                        case 'js':
                            $arr[] = '<script type="text/javascript" src="' . $file . '" ></script>';
                            break;
                    }
                }
            }
        }

        return $arr;
    }


    public function getTemplateBlockScriptTag($domain = "admin", $type = "js", $url = true)
    {

        $file = $this->getTemplateBlockPath() . '/' . $domain . '.' . $type;
        $exists = File::exists($file);

        if ($exists) {
            if ($url === true) {
                $file = url($file);
            };

            switch ($type) {
                case 'css':
                    return '<link rel="stylesheet" href="' . asset($file) . '"/>';
                    break;

                case 'js':
                    return '<script type="text/javascript" src="' . asset($file) . '" ></script>';
                    break;
                default:;
            }
        }

        return;
    }



    public function getTemplateBlockPath($from = '')
    {

        $path = 'storage/' . config('app.block_path') . $this->library->block_theme . '/' . $this->library->block_template;
        $prefix = '';

        switch ($from) {
            case 'root':;
                break;
            case 'absolute':;
                break;
            case 'relative':;
                break;
            case 'url':
                $prefix = config('app.url') . '/';
                break;
            default:;
        }

        return $prefix . $path;
    }


    public function itemsCount($attr = null)
    {

        $count = 0;

        $fields = json_decode($this->block_content_values);

        $count = count((array)$fields);

        /*
        if ($fields == null) {
            return 0;
        }

        if ($attr !== null && isset($fields->$attr)) {

            $count = count((array) $fields->$attr);

        } else {

            $count = count((array)reset($fields));
        }
        */

        return $count;
    }

    public function itemsMin()
    {

        $num = $this->settings('min-items');

        return !$num ? 1 : $num;
    }

    public function itemsMax()
    {

        $num = $this->settings('max-items');

        return !$num ? 1 : $num;
    }

    private function textToParagraphs($str)
    {

        //REPLACE linebreaks
        $search[] = '/(\\r\\n){2}/uismx';
        $replace[] = '</p><p>';

        $search[] = '/(\\r\\n){1}/uismx';
        $replace[] = '<br />';

        return preg_replace($search, $replace, $str);
    }

    public function content2htmldecode($item, $num = 0)
    {

        return html_entity_decode($this->content($item, $num));
    }

    public function content2html($item, $num = 0)
    {

        $str = $this->content($item, $num);

        return  $this->textToParagraphs($str);
    }


    public function content($item, $num = 0, $fallback = false)
    {

        $preview = \Request::segment(1) === 'preview' ? 1 : 0;
        $domain = isset(\Route::current()->action['prefix']) ? 1 : 0;

        if ($domain == 1 || $preview == 1) {
            $fields = json_decode($this->block_content_values);
        } else {
            $fields = json_decode($this->block_content_values_approved);
        }

        if (is_array($fields)) {
            if (isset($fields[$num]->$item)) {
                return $fields[$num]->$item;
            }
        } elseif (is_object($fields)) {
            if (isset($fields->$item)) {
                return $fields->$item;
            } else {
                $i = 0;

                foreach ($fields as $key => $val) {
                    if (is_object($val)) {
                        if ($i == $num) {
                            return $val->$item;
                        }
                    } else {
                        if ($item == $key || $i == $num) {
                            $fields->{"$key"};
                        }
                    }

                    $i++;
                }
            }
        }

        return !$fallback ? '' : $fallback;
    }


    public function contentImg($item, $domain = 'admin')
    {

        $path = $this->getTemplateBlockPath('url');
        return $path . '/' . $domain . '/img/' . $item;
    }


    public function contentImagePlaceholder()
    {

        return url('/system/img/placeholder.svg');
    }

    public function imagePlaceholderError()
    {

        $img = $this->contentImagePlaceholder();
        return 'onerror="this.src=\'' . $img . '\';"';
    }
    /**
     *
     * Get a given field value from a block's settings column.
     * An optional prefix may be used to create class names
     *
     */
    public function settings($attr, $prefix = null)
    {

        switch ($attr) {
            case 'padding':
            case 'margin':
                return  $this->makePaddingMarginClasses($attr);
                break;

            case 'columns':
                $val = $this->attributeFieldValues($attr, $prefix);
                return  $this->getSettingsColumns($attr, $val);
                break;

            default:
                return  $this->attributeFieldValues($attr, $prefix);
                break;
        }

        return;
    }

    public function makeBlockDefaultField($column)
    {

        return 'block_default_fields[' . $this->block_uid . '][' . $column . ']';
    }



    private function makePaddingMarginClasses($attr)
    {

        $prefix = substr($attr, 0, 1);

        $str = '';

        $classes = $this->attributeFieldPartials($attr, true);

        if (count($classes) > 0) {
            if (array_key_exists('t', $classes)) {
                $t = $classes['t'];
            } else {
                $t = null;
            }

            if (array_key_exists('r', $classes)) {
                $r = $classes['r'];
            } else {
                $r = null;
            }

            if (array_key_exists('b', $classes)) {
                $b = $classes['b'];
            } else {
                $b = null;
            }

            if (array_key_exists('l', $classes)) {
                $l = $classes['l'];
            } else {
                $l = null;
            }

            // IF ALL ARE THE SAME
            if ($t === $r && $r === $b && $b === $l && $t != null) {
                return $prefix . '-' . $t;
            }

            // IF X ARE THE SAME
            if ($l === $r && $l != null) {
                $classes['x'] = $classes['l'];
                unset($classes['l']);
                unset($classes['r']);
            }

            // IF Y ARE THE SAME
            if ($t === $b && $t != null) {
                $classes['y'] = $classes['t'];
                unset($classes['t']);
                unset($classes['b']);
            }

            foreach ($classes as $key => $val) {
                $str .= $prefix . $key . '-' . $val . ' ';
            }

            return $str;
        }

        return;
    }

    private function getSettingsColumns($attr)
    {
        $prefix = '';
        $str = '';

        $attr_values = $this->attributeFieldValues();

        if (isset($attr_values->columns)) {
            $breakpoint = $attr_values->breakpoint ? $attr_values->breakpoint : null;
            $columns = $attr_values->columns;

            if ($breakpoint != null) {
                $str .= '-' . $breakpoint;
            }

            if ($columns != null) {
                $prefix = 'col';
                $str .= '-' . $columns;
            }
        }

        return $prefix . $str;
    }


    public function makeBlockDefaultFields()
    {

        $str = '';
        $fields = [
            'block_lid' => $this->block_lid,
            'block_uid' => $this->block_uid,
            'block_order' => $this->block_order,
            'block_offset' => $this->block_offset,
            'block_published' => $this->block_published,
        ];

        foreach ($fields as $key => $val) {
            $str .= $this->makeHiddenInput('block_default_fields', $key, $val);
        }

        return $str;
    }



    private function attributeFieldPartials($attr)
    {

        $attr_values = json_decode($this->block_attribute_values);

        $short = explode('-', $attr);
        $attr = $short[0];
        $classes = [];

        foreach ($attr_values as $key => $val) {
            if ($key != null && substr($key, 0, strlen($attr)) == $attr && $val != null) {
                $suffix_pos = stripos($key, '-');
                $suffix = substr($key, $suffix_pos + 1, 1);
                $classes[$suffix] = $val;
            }
        }

        return $classes;
    }


    public function blockLibraryColumn($attr = null)
    {

        if ($attr === null) {
            return json_decode($this);
        }

        return json_decode($this->$attr);
    }


    public function attributeFieldValues($attr = null, $prefix = null)
    {

        $obj = json_decode($this->block_attribute_values);

        if ($attr !== null) {
            if (isset($obj->$attr) && $obj->$attr != null) {
                return $prefix . $obj->$attr;
            } else {
                return '';
            }
        }

        return $obj;
    }


    /**
     *
     * Return the content field label for a given content field name
     *
     */

    public function contentLabel($attr = null, $prop = 'name')
    {
        $attr_library_fields = [];

        if (isset($this->library->block_content_fields)) {
            $attr_library_fields = json_decode($this->library->block_content_fields);
        } else {
            $attr_library_fields = json_decode($this->block_content_fields);
        }

        if ($attr_library_fields !== null) {
            foreach ($attr_library_fields as $key => $val) {
                if ($val->name == $attr && isset($val->{$prop})) {
                    return $val->{$prop};
                }
            }
        }
    }


    private function makeLibraryAttributeDefaults()
    {

        $type = 0;
        $attr_library_fields = [];

        if ($this->library !== null) {
            $attr_library_fields = json_decode($this->library->block_attribute_fields);
            $attr_library_values = json_decode($this->library->block_attribute_values);
        };

        $attr_values = $attr_library_fields;

        if ($this->block_attribute_values !== null) {
            $attr_block_values = json_decode($this->block_attribute_values);
        }

        foreach ($attr_library_fields as $key => $val) {
            $name = $val->name;

            if (isset($attr_block_values->$name)) {
                $val = $attr_block_values->$name;
            } else {
                $val = $attr_library_values->$name;
            }

            $attr_values{
            $key}->value = $val;
        }

        return $attr_values;
    }

    public function attributeFields()
    {

        $attr_library_fields = $this->makeLibraryAttributeDefaults();

        $str = '';

        foreach ($attr_library_fields as $key => $val) {
            if (isset($val->type)) {
                switch ($val->type) {
                    case 'text':
                        $field = $this->makeText($val);
                        break;
                    case 'textarea':
                        $field = $this->makeTextarea($val);
                        break;
                    case 'select':
                        $field = $this->makeSelect($val);
                        break;
                    case 'checkbox':
                        $field = $this->makeCheckbox($val);
                        break;
                    case 'radio':
                        $field = $this->makeRadio($val);
                        break;

                    default:
                        $field = '';
                }

                $str .= $field;
            }
        }

        return $str;
    }



    private function makeHiddenInput($name, $key, $val)
    {
        $field = '<input type="hidden" name="' . $name . '[' . $this->block_uid . '][' . $key . ']" value="' . $val . '" />';

        return $field;
    }

    private function makeText($data)
    {
        if (!isset($data->name) || !isset($data->value) || !isset($data->type)) {
            return;
        }

        $field = '<input type="' . $data->type . '" name="block_attribute_values[' . $this->block_uid . '][' . $data->name . ']" value="' . $data->value . '" />';

        $str = '<div class="col-auto">
					<div class="form-group">
						<label>' . $data->label . '</label>
						' . $field .
            '</div>
				</div>';

        return $str;
    }


    private function makeCheckbox($data)
    {

        if (!isset($data->name) || !isset($data->value) || !isset($data->checked)) {
            return;
        }

        $field = '<input type="checkbox" class="form-check-input" name="block_attribute_values[' . $this->block_uid . '][' . $data->name . ']" ' . $data->checked . ' value="' . $data->value . '" />';

        $str = '
						<div class="form-group col-auto no-border">
                            <label>' . $data->label . ' ' . $data->checked . '</label>

                            <div class="input-group justify-content-center">
    				
                				<label class="switch">' . $field . '
                					  <span class="slider rounded"><i class="fas fa-check" data-fa-transform="right-10 down-3"></i><i class="fas fa-times" data-fa-transform="right-25 down-3"></i></span>
                				</label>
                			</div>
                			
						</div>
				';

        return $str;
    }


    private function makeRadio($data)
    {

        if (!isset($data->name) || !isset($data->value) || !isset($data->checked)) {
            return;
        }

        /*
        $field = '<input type="checkbox" class="form-check-input" name="block_attribute_values['.$this->block_uid.']['.$data->name.']" '.$data->checked.' value="'.$data->value.'" />';

        $str = '<div class="form-check-inline col-auto">
                  <label class="form-check-label">
                    '.$field.$data->label.'
                  </label>
                </div>';


        */
        return $str;
    }


    private function makeSelect($data)
    {

        $options = explode(',', $data->options);
        $selected = explode(',', $data->value);

        $field = '<select class="full-width form-control" name="block_attribute_values[' . $this->block_uid . '][' . $data->name . ']" >';

        $str = '';

        foreach ($options as $key => $val) {
            $sel = '';
            if (in_array($val, $selected)) {
                $sel = 'selected';
            }
            $str .= '<option value="' . $options[$key] . '" ' . $sel . '>' . $val . '</option>';
        }

        $str = '<div class="col-auto d-inline-block">
                    <div class="form-group">
                    <label>' . $data->label . '</label>' .
            $field .

            $str .

            '</select>
                    </div>
				</div>';

        return $str;
    }


    public function getBlockLibrarySelect($data)
    {

        $str = '<option value=""></option>';

        foreach ($data as $key => $val) {
            $str .= '<option value="' . $val->id . '">' . $val->block_name . '</option>';
        }

        return $str;
    }



    public function blockStatus()
    {

        $now = \Carbon\Carbon::now();

        if ($this->block_content_values_approved == null) {
            return 'draft';
        }

        if ($this->block_published == 0 && $this->block_content_values_approved != null) {
            return 'pending';
        }

        if ($this->block_published == 1 && $this->block_content_values_approved != null) {
            return 'published';
        }

        return;
    }


    public function statusBadge()
    {

        $class = '';

        $block_status = $this->blockStatus();

        switch ($block_status) {
            case 'pending':
                $class = "warning text-dark";
                break;

            case 'published':
                $class = "success";
                break;

            case 'draft':
                $class = "disabled";
                break;

            default:
                $class = "";
        }

        if ($block_status != null) {
            $str = '<i class="block-status badge badge-' . $class . '" data-toggletext="reverting">' . $block_status . '</i>';
            return $str;
        }

        return;
    }


    public function isLive()
    {

        $status = $this->blockStatus();

        if ($status == 'live') {
            return true;
        }

        return false;
    }
}
