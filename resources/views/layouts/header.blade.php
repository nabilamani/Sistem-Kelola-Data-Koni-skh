<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                        <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search" onkeyup="filterMenu()">
                            </form>
                        </div>
                    </div>
                </div>


                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        <p class="mb-0">{{ Auth::user()->level }}</p>
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="./email-inbox.html" class="dropdown-item">
                                <i class="mdi mdi-account"></i>
                                <span class="ml-2">{{ Auth::user()->name }}</span>
                            </a>
                            <a href="./email-inbox.html" class="dropdown-item">
                                <i class="icon-envelope-open"></i>
                                <span class="ml-2">Inbox </span>
                            </a>
                            <a href="#" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i>
                                <span class="ml-2">Logout</span>
                            </a>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<script>
    function filterMenu() {
        // Get the search query and convert it to lowercase
        let input = document.getElementById('searchInput').value.toLowerCase();

        // Get all top-level menu items in the sidebar
        let menuItems = document.querySelectorAll('#menu > li');

        // Loop through each top-level menu item
        menuItems.forEach(function(topMenuItem) {
            let topMenuText = topMenuItem.querySelector('.nav-text') ? topMenuItem.querySelector('.nav-text')
                .textContent.toLowerCase() : '';
            let matchFound = topMenuText.includes(input); // Flag to indicate if there’s a match

            // Check all submenu items within this top-level menu item
            let subMenuItems = topMenuItem.querySelectorAll('ul li');
            subMenuItems.forEach(function(subMenuItem) {
                let subMenuText = subMenuItem.textContent.toLowerCase();

                // Show or hide submenu items based on the search query
                if (subMenuText.includes(input)) {
                    subMenuItem.style.display = '';
                    matchFound = true; // Keep the top-level item visible if a match is found
                    expandParentMenus(subMenuItem); // Expand parent menus of matching submenus
                } else {
                    subMenuItem.style.display = 'none';
                }
            });

            // Show or hide the top-level menu item
            if (matchFound) {
                topMenuItem.style.display = '';
                topMenuItem.setAttribute('aria-expanded', 'true'); // Automatically expand if it has matches
            } else {
                topMenuItem.style.display = 'none';
                topMenuItem.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Function to expand all parent menus of a matched submenu item
    function expandParentMenus(element) {
        let parentMenu = element.closest('li.has-arrow');
        while (parentMenu) {
            parentMenu.style.display = ''; // Show the parent menu
            parentMenu.setAttribute('aria-expanded', 'true'); // Set it to expanded
            parentMenu.classList.add('active'); // Add active class to open it
            parentMenu = parentMenu.parentElement.closest('li.has-arrow'); // Move up to the next parent
        }
    }
</script>
