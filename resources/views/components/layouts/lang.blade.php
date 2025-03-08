<x-dropdown>
    <x-slot name="trigger">
        <div class="flex flex-row items-center gap-2 hover:cursor-pointer p-4 rounded-lg transition hover:text-gray-600 active:scale-95">

            <span class="flex flex-row space-x-2  hover:cursor-pointer text-lg font-semibold ">
                {{config("languages")[App::getLocale()]['name']}}
                {{config("languages")[App::getLocale()]['flag']}}
            </span>
        </div>
    </x-slot>
    <x-slot name="content">
        @foreach(config("languages") as $code =>$lang)
            <span class="flex flex-row space-x-2 hover:cursor-pointer m-4 flex flex-col justify-center text-center">
              <a href="{{route('language',$code)}}" class ="hover:bg-gray-300 rounded h-10 pt-2">
                  {{$lang['name']}}
                  {{$lang['flag']}}
                </a>
            </span>

        @endforeach

    </x-slot>


</x-dropdown>
