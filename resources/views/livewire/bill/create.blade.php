<div class="container mx-auto px-4 py-5">
    <div class="header-text">
        <h1 class="uppercase tracking-wide text-3xl text-indigo-600 font-bold">@lang('bill.add_new_bill_title')</h1>
        <hr>
        <p class="mt-2 text-gray-600">@lang('bill.add_new_bill_description')</p>
    </div>
    <form>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    @lang('bill.')
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Doe">


            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Last Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" placeholder="Doe">
            </div>

        </div>



    </form>


</div>