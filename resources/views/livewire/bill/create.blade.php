<div class="container mx-auto px-4 py-5">
    <div class="header-text">
        <h1 class="uppercase tracking-wide text-3xl text-indigo-600 font-bold">@lang('bill.add_new_bill_title')
        </h1>
        <hr>
        <p class="mt-2 text-gray-600">@lang('bill.add_new_bill_description')</p>
    </div>

    <form class="mt-6" wire:submit.prevent="createBill">
        <!-- Added Massage  -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                @if (session()->has('message'))
                <script>
                    alertify.notify("@lang('bill.add_new_bill_after_submit_added_title')", 'success', 3);

                </script>

                @endif
            </div>
            <!-- Name -->
            <div class="w-full mt-6 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="add_new_bill_label_bill_name">
                    @lang('bill.add_new_bill_label_bill_name')
                </label>
                <input wire:model="name"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="add_new_bill_label_bill_name" type="text" placeholder="long dress">
                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

            </div>
            <br>
            <!-- buidling -->
            <div class="w-full md:w-1/2 px-3 mt-6 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    @lang('bill.add_new_bill_label_bill_building_select_one')
                </label>
                <div class="relative">
                    <select wire:model="building_id"
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        <option value="" selected disabled hidden>
                            @lang('bill.add_new_bill_label_bill_building_select_one')</option>

                        @foreach ($buildings as $buildings)
                        <option value="{{$buildings->id}}">{{$buildings->name}} - {{$buildings->city}}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                @error('building_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>


            <!-- buidling -->
            <div class="w-full md:w-1/2 px-3  mt-6 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    @lang('bill.add_new_bill_label_bill_category_select_one')
                </label>
                <div class="relative">
                    <select wire:model="category_id"
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        <option value="" selected disabled hidden>
                            @lang('bill.add_new_bill_label_bill_category_select_one')</option>

                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$buildings->name}} </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                @error('category_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>



            <!-- description -->
            <div class="w-full mt-6 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="add_new_bill_label_bill_description">
                    @lang('bill.add_new_bill_label_bill_description')
                </label>

                <textarea
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model="description" id="add_new_bill_label_bill_description" cols="30" rows="10"
                    placeholder="some style , model , year and etc"></textarea>
                @error('description') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <!-- items -->
            <div class="w-full mt-6 px-3" id="items">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="add_new_bill_label_bill_items">
                    @lang('bill.add_new_bill_label_bill_items') 
                </label>


                @for ($index = 0; $index < $itemCount; $index++) <div wire:key="items-field-{{$index}}">
                    <p> @lang('bill.add_new_bill_label_bill_items') {{$index + 1}} </p>
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="add_new_bill_label_bill_items_name">
                        @lang('bill.add_new_bill_label_bill_items_name')
                    </label>
                    <input type="text"
                        class="md:w-1/3  appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model="items.{{ $index }}.name">


                        
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="add_new_bill_label_bill_items_price">
                        @lang('bill.add_new_bill_label_bill_items_price')
                    </label>

                    <input type="text"
                        class="md:w-1/3  appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model="items.{{ $index }}.price">

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="add_new_bill_label_bill_items_count">
                        @lang('bill.add_new_bill_label_bill_items_count')
                    </label>
                    <input type="text"
                        class="md:w-1/3  appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        wire:model="items.{{ $index }}.count">
            </div>
            @endfor

            @error('items') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <!-- File-->
        <div class="w-full mt-6 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                for="add_new_bill_label_bill_file">
                @lang('bill.add_new_bill_label_bill_file')
            </label>
            <input type="file" wire:model="photo">

            @error('photo') <span class="error">{{ $message }}</span> @enderror
        </div>








        <!-- Submit -->
        <div class="relative overflow-hidden px-3 mt-8">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" type="submit">
                @lang('bill.add_new_bill_label_add_new_btn')

            </button>
        </div>


</div>



</form>


</div>
