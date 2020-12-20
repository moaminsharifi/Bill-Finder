<div class="container mx-auto px-4 py-5">
    <div class="header-text">
        <h1 class="uppercase tracking-wide text-3xl text-indigo-600 font-bold">@lang('category.show_category_heading')
            #{{$category->id}}
        </h1>
        <hr>

    </div>
    <div class="category-info">
        <div class="w-full rounded overflow-hidden shadow-lg">
            <img  class="max-w-md mx-auto pt-4" src="{{$category->getPublicUrl()}}" alt="{{$category->name}}" title="{{$category->name}}">
            <div class="px-6 py-4">
               
                <div class="font-bold text-xl mb-2">{{$category->name}}</div>
                <p class="text-gray-700 text-base">
                    {{$category->address}}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                
     
                <a href="{{route('category.edit' , $category->id)}}" class="bg-transparent rounded hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent  inline-block">@lang('category.index_table_header_edit')</a>
                
            </div>
        </div>

    </div>


</div>
