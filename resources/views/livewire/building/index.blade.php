<div class="container mx-auto px-4 py-5">
    <div class="header-text">
        <h1 class="uppercase tracking-wide text-3xl text-indigo-600 font-bold">@lang('building.index_building_heading')
        </h1>
        <hr>

    </div>

    <div class="data-table">
        <table class="container table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">@lang('building.index_table_header_name')</th>
                    <th class="px-4 py-2">@lang('building.index_table_header_city')</th>
                    <th class="px-4 py-2">@lang('building.index_table_header_see')</th>
                    <th class="px-4 py-2">@lang('building.index_table_header_edit')</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($buildings))
                    @foreach ($buildings as $building)
                    <tr>
                        <td class="border px-4 py-2">{{$building->name}}</td>
                        <td class="border px-4 py-2">{{$building->city}}</td>
                        <td class="border px-4 py-2 text-indigo-600"><a
                                href="{{route('building.show' , $building->id)}}">@lang('building.index_table_header_see')</a>
                        </td>
                        <td class="border px-4 py-2 text-indigo-600"><a
                                href="{{route('building.edit' , $building->id)}}">@lang('building.index_table_header_edit')</a>
                        </td>

                    </tr>
                    @endforeach
                @endif




            </tbody>
        </table>

    </div>


</div>
