<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class item extends Component
{
    const FORM_SIZE = 12;

    /**
     * Type (ex: <input type="text"/>)
     *
     * @var string
     */
    public $type;

    /**
     * ID (ex: <input id="kode"/>)
     *
     * @var string
     */
    public $id;

    /**
     * Name (ex: <input name="kode"/>)
     *
     * @var string
     */
    public $name;

    /**
     * Label form (ex: <label for="kode">Kode</label>)
     *
     * @var string
     */
    public $label;

    /**
     * Required (wajib diisi)
     *
     * @var string
     */
    public $required;

    /**
     * Placeholder (ex: <input placeholder="Masukkan kode"/>)
     *
     * @var string
     */
    public $placeholder;

    /**
     * Legend (ex: <span class="help-block">Required</span>)
     *
     * @var string
     */
    public $legend;

    /**
     * Jumlah kolom form
     *
     * @var int
     */
    public $column_count;

    /**
     * Pilihan dropdown (ex. <option value="foo">Foo</option>)
     *
     * @var bool
     */
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $id, $name, $required = '', $label = '', $placeholder = '', $legend = '', $columns = 1, $options = [])
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->required = $required;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->legend = $legend;
        $this->column_count = $this->set_column_width($columns);
        $this->options = $options;
    }

    public function set_column_width($columns)
    {
        return self::FORM_SIZE / $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.item');
    }
}
