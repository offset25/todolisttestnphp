TODO LIST.
Create a simple to-do-list page that should -
○ Prepopulate with list of tasks from this JSON on page load in alphabetical order
https://jsonplaceholder.typicode.com/todos for User ID 1
○ Load the JSON tasks into a PHP array $todos
○ Add an Item (add.php)
○ Add task name from Input text box
○ Click on “Save Item” makes an Ajax call to file add.php, which adds item to the
PHP array $todos and also to the end of the todo list on the screen. $todos should be
passed to the ajax file and all additions should be added to $todos array. (not just JS)
○ Mark Task as done - Use Ajax to change status (done.php). Update PHP array $todos.
Use Jquery to remove 2 buttons and replace it with a badge “Done” and also marked in
PHP $todos array.
○ Delete - Delete items from $todos and remove task from UI and also remove from $todos
array.
○ All operations should be done on $todos array via PHP. Do not use localstorage or
database or files to store. Application page does not reload for any of the above
operations

● Deliverables
○ index.php - main page, add.php - adds to array, done.php - changes task to done,
custom.css - any css required, custom.js - all jquery

● Our evaluation will be based on - Quality of code, PHP, Ajax and Jquery, ability to come up with
edge-case scenarios and error handling, UI/UX Presentation Skills
● Rules
1. You CAN search on the internet for any code snippets and use them
2. All code needs to be in the respective file names as mentioned above
3. You need to use Jquery &amp; Bootstrap only
4. You cannot include any more JS or CSS files
5. Improve user experience - think of prompts, confirmation alerts, animations etc.
6. Using reusable code/ functions will earn you extra points
