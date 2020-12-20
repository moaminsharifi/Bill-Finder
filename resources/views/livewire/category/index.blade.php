<div class="container mx-auto px-4 py-5">
    <div class="header-text">
        <h1 class="uppercase tracking-wide text-3xl text-indigo-600 font-bold">@lang('category.index_category_heading')
        </h1>
        <hr>

    </div>

    <div class="data-table">
        <table class="container table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">@lang('category.index_table_header_name')</th>
                   
                    <th class="px-4 py-2">@lang('category.index_table_header_see')</th>
                    <th class="px-4 py-2">@lang('category.index_table_header_edit')</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($categories))
                    @foreach ($categories as $category)
                    <tr>
                        <td class="border px-4 py-2">{{$category->name}}</td>
                       
                        <td class="border px-4 py-2 text-indigo-600"><a
                                href="{{route('category.show' , $category->id)}}">@lang('category.index_table_header_see')</a>
                        </td>
                        <td class="border px-4 py-2 text-indigo-600"><a
                                href="{{route('category.edit' , $category->id)}}">@lang('category.index_table_header_edit')</a>
                        </td>

                    </tr>
                    @endforeach
                @endif




            </tbody>
        </table>

    </div>


</div>
