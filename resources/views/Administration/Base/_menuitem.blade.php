
                                       
                                      
@if ($item["submenu"] == [] && $item["Url"]!="")
    @if($item["State"]=="1")
                                                <li class="menu-item {{getSubMenuActivo($item["Url"])}}" aria-haspopup="true">
                                                    @if($item["Type"])
                                                        <a href="#" onClick="{{ $item["Url"] }}" data-toggle="modal" data-target="#kt_select_modalSelect1" class="menu-link">
                                                            <span class="menu-text">{{ $item["Name"] }}</span>
                                                            <span class="menu-desc"></span>
                                                        </a>
                                                    @else
                                                    <a href="{{ url($item["Url"]) }}" class="menu-link" >
                                                        <span class="menu-text">{{ $item["Name"] }}</span>
                                                        <span class="menu-desc"></span>
                                                    </a>
                                                    @endif
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