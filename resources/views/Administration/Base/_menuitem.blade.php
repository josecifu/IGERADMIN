
                                       
                                      
@if ($item["submenu"] == [] && $item["Url"]!="")
    @if($item["State"]=="1")
                                                <li class="menu-item {{getSubMenuActivo($item["Url"])}}" aria-haspopup="true">
                                                    <a href="{{ url($item["Url"]) }}" class="menu-link">
                                                        <span class="menu-text">{{ $item["Name"] }}</span>
                                                        <span class="menu-desc"></span>
                                                    </a>
                                                </li>
    @endif
@else
    @if($item["State"]=="1")
     <li class="menu-item   menu-item-submenu menu-item-rel {{getMenuActivo($item["Url"])}}" data-menu-toggle="click" aria-haspopup="true">
         <a href="javascript:;" class="menu-link menu-toggle">
            <span class="menu-text"> {{ $item["Name"] }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu menu-submenu-classic menu-submenu-left">
            <ul class="menu-subnav">
        @if ($item["submenu"] != [])
            @foreach ($item["submenu"] as $submenu)
                @include("Administration.Base._menuitem", ["item" => $submenu])
            @endforeach          
        @endif      
            </ul>
        </div>
    </li>
    @endif
@endif