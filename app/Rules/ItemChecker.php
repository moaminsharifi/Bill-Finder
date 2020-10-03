<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Exception;

class ItemChecker implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  array  $items
     * @return bool
     */
    public function passes($attribute, $items)
    {
        if(is_array($items)){
            $valid_item_keys = ['name' , 'price' , 'count'];
            $valid_item_keys = sort($valid_item_keys);
            foreach ($items as $item){
                $item_keys = array_keys($item);
                $item_keys = sort($item_keys);
                try {
                    if ($item_keys != $valid_item_keys) {
                        return false;
                    }
                    if (strlen($item['name']) > 180 || strlen( $item['name']) < 1) {
                        return false;
                    }
                    if (strlen($item['price']) > 180 || strlen( $item['price']) < 1) {
                        return false;
                    }
                    if ((int)$item['count'] < 1 || (int)$item['count'] > 10000000) {
                        return false;
                    }

                }catch (Exception $exception){
                    return false;
                }

            }
            return true;
        }
        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Item(s) Not In Valid Format';
    }
}
