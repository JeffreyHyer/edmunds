<?php

namespace Edmunds\Api;

class Vehicle extends AbstractApi
{

    public function __construct(\Edmunds\Edmunds $edmunds)
    {
        parent::__construct($edmunds);

        $this->edmunds->api = "vehicle";
    }

    /**
     * Get a list of car makes
     *
     * @param  string $state [Enum] one of ['new', 'used', 'future']
     * @param  string $year  The year of the car makes (1990 - current year)
     * @param  string $view  Response detail level [Enum] one of ['basic', 'full']
     *
     * @return [type]        [description]
     */
    public function makes($state = null, $year = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($year)
            $q['year'] = $year;

        if ($view)
            $q['view'] = $view;

        return $this->get("makes", $q);
    }

    /**
     * Get total count of car makes/brands
     *
     * @param  [type] $state [description]
     * @param  [type] $year  [description]
     * @param  string $view  [description]
     *
     * @return [type]        [description]
     */
    public function makeCount($state = null, $year = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($year)
            $q['year'] = $year;

        if ($view)
            $q['view'] = $view;

        return $this->get("makes/count", $q);
    }

    /**
     * Get details for a specific car make/brand
     *
     * @param  [type] $make  [description]
     * @param  [type] $state [description]
     * @param  [type] $year  [description]
     * @param  string $view  [description]
     *
     * @return [type]        [description]
     */
    public function make($make, $state = null, $year = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($year)
            $q['year'] = $year;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}", $q);
    }

    /**
     * Get total count of car models for specific car make
     *
     * @param  [type] $make     [description]
     * @param  [type] $state    [description]
     * @param  [type] $year     [description]
     * @param  [type] $submodel [description]
     * @param  [type] $category [description]
     * @param  string $view     [description]
     *
     * @return [type]           [description]
     */
    public function modelCount($make, $state = null, $year = null, $submodel = null, $category = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($year)
            $q['year'] = $year;

        if ($submodel)
            $q['submodel'] = $submodel;

        if ($category)
            $q['category'] = $category;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/models/count", $q);
    }

    /**
     * [model description]
     *
     * @param  [type] $make     [description]
     * @param  [type] $model    [description]
     * @param  [type] $state    [description]
     * @param  [type] $year     [description]
     * @param  [type] $submodel [description]
     * @param  [type] $category [description]
     * @param  string $view     [description]
     *
     * @return [type]           [description]
     */
    public function model($make, $model, $state = null, $year = null, $submodel = null, $category = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($year)
            $q['year'] = $year;

        if ($submodel)
            $q['submodel'] = $submodel;

        if ($category)
            $q['category'] = $category;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/{$model}");
    }

    /**
     * [models description]
     *
     * @param  [type] $make     [description]
     * @param  [type] $state    [description]
     * @param  [type] $year     [description]
     * @param  [type] $submodel [description]
     * @param  [type] $category [description]
     * @param  string $view     [description]
     *
     * @return [type]           [description]
     */
    public function models($make, $state = null, $year = null, $submodel = null, $category = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($year)
            $q['year'] = $year;

        if ($submodel)
            $q['submodel'] = $submodel;

        if ($category)
            $q['category'] = $category;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/models", $q);
    }

    /**
     * [modelYears description]
     *
     * @param  [type] $make     [description]
     * @param  [type] $model    [description]
     * @param  [type] $state    [description]
     * @param  [type] $submodel [description]
     * @param  [type] $category [description]
     * @param  string $view     [description]
     *
     * @return [type]           [description]
     */
    public function modelYears($make, $model, $state = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/{$model}/years", $q);
    }

    public function modelYearCount($make, $model, $state = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/{$model}/years/count", $q);
    }

    public function modelYear($make, $model, $year, $state = null, $submodel = null, $category = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($submodel)
            $q['submodel'] = $submodel;

        if ($category)
            $q['category'] = $category;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/{$model}/{$year}", $q);
    }

    /**
     * [styleCount description]
     *
     * @param  [type] $state [description]
     *
     * @return [type]        [description]
     */
    public function styleCount($state = null)
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        return $this->get("styles/count", $q);
    }

    /**
     * [makeStyleCount description]
     *
     * @param  [type] $make  [description]
     * @param  [type] $state [description]
     *
     * @return [type]        [description]
     */
    public function makeStyleCount($make, $state = null)
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        return $this->get("{$make}/styles/count", $q);
    }

    /**
     * [makeModelStyleCount description]
     *
     * @param  [type] $make  [description]
     * @param  [type] $model [description]
     * @param  [type] $state [description]
     *
     * @return [type]        [description]
     */
    public function makeModelStyleCount($make, $model, $state = null)
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        return $this->get("{$make}/{$model}/styles/count", $q);
    }

    /**
     * [makeModelYearStyleCount description]
     *
     * @param  [type] $make     [description]
     * @param  [type] $model    [description]
     * @param  [type] $year     [description]
     * @param  [type] $state    [description]
     * @param  [type] $submodel [description]
     * @param  [type] $category [description]
     * @param  string $view     [description]
     *
     * @return [type]           [description]
     */
    public function makeModelYearStyleCount($make, $model, $year, $state = null, $submodel = null, $category = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($submodel)
            $q['submodel'] = $submodel;

        if ($category)
            $q['category'] = $category;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/{$model}/{$year}/styles/count", $q);
    }

    /**
     * [style description]
     *
     * @param  [type] $styleId [description]
     * @param  string $view    [description]
     *
     * @return [type]          [description]
     */
    public function style($styleId, $view = "basic")
    {
        $q = [];

        if ($view)
            $q['view'] = $view;

        return $this->get("styles/{$styleId}", $q);
    }

    /**
     * [makeModelYearStyles description]
     *
     * @param  [type] $make     [description]
     * @param  [type] $model    [description]
     * @param  [type] $year     [description]
     * @param  [type] $state    [description]
     * @param  [type] $submodel [description]
     * @param  [type] $category [description]
     * @param  string $view     [description]
     *
     * @return [type]           [description]
     */
    public function makeModelYearStyles($make, $model, $year, $state = null, $submodel = null, $category = null, $view = "basic")
    {
        $q = [];

        if ($state)
            $q['state'] = $state;

        if ($submodel)
            $q['submodel'] = $submodel;

        if ($category)
            $q['category'] = $category;

        if ($view)
            $q['view'] = $view;

        return $this->get("{$make}/{$model}/{$year}/styles", $q);
    }

    /**
     * [styleTransmissions description]
     *
     * @param  [type] $styleId      [description]
     * @param  [type] $availability [description]
     * @param  [type] $name         [description]
     *
     * @return [type]               [description]
     */
    public function styleTransmissions($styleId, $availability = null, $name = null)
    {
        $q = [];

        if ($availability)
            $q['availability'] = $availability;

        if ($name)
            $q['name'] = $name;

        return $this->get("styles/{$styleId}/transmissions", $q);
    }

    /**
     * [styleEngines description]
     *
     * @param  [type] $styleId      [description]
     * @param  [type] $availability [description]
     * @param  [type] $name         [description]
     *
     * @return [type]               [description]
     */
    public function styleEngines($styleId, $availability = null, $name = null)
    {
        $q = [];

        if ($availability)
            $q['availability'] = $availability;

        if ($name)
            $q['name'] = $name;

        return $this->get("styles/{$styleId}/engines", $q);
    }

    /**
     * [transmission description]
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function transmission($id)
    {
        return $this->get("transmissions/{$id}");
    }

    /**
     * [engine description]
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function engine($id)
    {
        return $this->get("engines/{$id}");
    }

    /**
     * [styleColors description]
     *
     * @param  [type] $id       [description]
     * @param  [type] $category [description]
     *
     * @return [type]           [description]
     */
    public function styleColors($id, $category = null)
    {
        $q = [];

        if ($category)
            $q['category'] = $category;

        return $this->get("styles/{$id}/colors", $q);
    }

    /**
     * [styleOptions description]
     *
     * @param  [type] $id       [description]
     * @param  [type] $category [description]
     *
     * @return [type]           [description]
     */
    public function styleOptions($id, $category = null)
    {
        $q = [];

        if ($category)
            $q['category'] = $category;

        return $this->get("styles/{$id}/options", $q);
    }

    /**
     * [color description]
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function color($id)
    {
        return $this->get("colors/{$id}");
    }

    /**
     * [option description]
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function option($id)
    {
        return $this->get("options/{$id}");
    }

    /**
     * [styleEquipment description]
     *
     * @param  [type] $id            [description]
     * @param  [type] $availability  [description]
     * @param  [type] $equipmentType [description]
     * @param  [type] $name          [description]
     *
     * @return [type]                [description]
     */
    public function styleEquipment($id, $availability = null, $equipmentType = null, $name = null)
    {
        $q = [];

        if ($availability)
            $q['availability'] = $availability;

        if ($equipmentType)
            $q['equipmentType'] = $equipmentType;

        if ($name)
            $q['name']= $name;

        return $this->get("styles/{$id}/equipment", $q);
    }

    /**
     * [equipment description]
     *
     * @param  [type] $id [description]
     *
     * @return [type]     [description]
     */
    public function equipment($id)
    {
        return $this->get("equipment/{$id}");
    }

    /**
     * Fetch vehicle information from a provided VIN
     *
     * @param  string $vin The VIN for which to perform the lookup
     *
     * @return stdClass      Standard response object from $this->_respond()
     */
    public function vin($vin)
    {
        return $this->get("vins/{$vin}");
    }

    /**
     * Fetch vehicle information from a provided squish VIN
     *
     * @param  string $squishVin    The Squish VIN (first 11 digits of VIN minus the 9th digit)
     *
     * @return stdClass             Standard response object from $this->_respond()
     */
    public function squishVin($squishVin)
    {
        return $this->get("squishvins/{$squishVin}");
    }
}
