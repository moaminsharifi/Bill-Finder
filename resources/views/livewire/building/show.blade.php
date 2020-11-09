<div class="container mx-auto px-4 py-5">
    <div class="header-text">
        <h1 class="uppercase tracking-wide text-3xl text-indigo-600 font-bold">@lang('building.show_building_heading')
            #{{$building->id}}
        </h1>
        <hr>

    </div>
    <div class="building-info">
        <div class="w-full rounded overflow-hidden shadow-lg">
            @if (strpos($building->google_map_url ,"https://www.google.com/maps" ) !== false)
        <iframe class="w-full" height="500" src="{{$building->google_map_url}}" frameborder="0"></iframe>

            @else
                <iframe class="w-full" height="500" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d207371.97794959205!2d51.489901738318096!3d35.69701178451661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e00491ff3dcd9%3A0xf0b3697c567024bc!2z2KrZh9ix2KfZhtiMINin2LPYqtin2YYg2KrZh9ix2KfZhtiMINin24zYsdin2YY!5e0!3m2!1sfa!2sde!4v1604764226409!5m2!1sfa!2sde" frameborder="0"></iframe>
            @endif
            <div class="px-6 py-4">
                <span
            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$building->city}}</span>
                <div class="font-bold text-xl mb-2">{{$building->name}}</div>
                <p class="text-gray-700 text-base">
                    {{$building->address}}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                
     
                <a href="{{route('building.edit' , $building->id)}}" class="bg-transparent rounded hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent  inline-block">@lang('building.index_table_header_edit')</a>
                
            </div>
        </div>

    </div>


</div>
