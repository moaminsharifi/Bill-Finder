<div class="container mx-auto px-4 py-5">
    <div class="header-text">
        <h1 class="uppercase tracking-wide text-3xl text-indigo-600 font-bold">@lang('building.add_new_building_title')
        </h1>
        <hr>
        <p class="mt-2 text-gray-600">@lang('building.add_new_building_description')</p>
    </div>

    <form class="mt-6" wire:submit.prevent="createBuilding">
        <!-- Added Massage  -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                @if (session()->has('message'))
                <script>
                    alertify.notify("@lang('building.add_new_building_after_submit_added_title')", 'success', 3);

                </script>

                @endif
            </div>
            <!-- Name -->
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="add_new_building_label_building_name">
                    @lang('building.add_new_building_label_building_name')
                </label>
                <input wire:model="name"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="add_new_building_label_building_name" type="text" placeholder="Doe">
                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

            </div>
            <!-- City -->
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    @lang('building.add_new_building_label_building_city')
                </label>
                <div class="relative">
                    <select wire:model="city"
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                        <option value="" selected disabled hidden>
                            @lang('building.add_new_building_label_building_city_select_one')</option>
                        <option value="tehran">@lang('building.tehran')</option>
                        <option value="qeshem">@lang('building.qeshem')</option>
                        <option value="bandar">@lang('building.bandar')</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                @error('city') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <!-- Address -->
            <div class="w-full mt-6 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="add_new_building_label_building_address">
                    @lang('building.add_new_building_label_building_address')
                </label>

                <textarea
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    wire:model="address" id="add_new_building_label_building_address" cols="30" rows="10"
                    placeholder="tehran, omidi str ..."></textarea>
                @error('address') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>


            <!-- Google Map -->
            <div class="w-full mt-6 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="add_new_building_label_building_google_map_url">
                    @lang('building.add_new_building_label_building_google_map_url')
                </label>
                <input wire:model="google_map_url"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="add_new_building_label_building_google_map_url" type="text" placeholder="https://www.google.com/maps/d/viewer?msa=0&mid=1J9mfceV7K1k0itaTytt-7iX8PT4&ll=35.69611100000001%2C51.423056000000024&z=17
">
                @error('google_map_url') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>




            <!-- Submit -->
            <div class="relative overflow-hidden px-3 mt-8">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" type="submit">
                    @lang('building.add_new_building_label_add_new_btn')

                </button>
            </div>


        </div>



    </form>


</div>
