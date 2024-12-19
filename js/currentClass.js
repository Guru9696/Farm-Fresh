/* Add this to your existing JavaScript code */
document.addEventListener('DOMContentLoaded', function() {
    var menuItems = document.querySelectorAll('.sf-menu li a');
    
    menuItems.forEach(function(item) {
        item.addEventListener('click', function() {
            // Remove 'current' class from all menu items
            menuItems.forEach(function(el) {
                el.parentElement.classList.remove('current');
            });
            
            // Add 'current' class to the clicked menu item
            this.parentElement.classList.add('current');
        });
    });
});
