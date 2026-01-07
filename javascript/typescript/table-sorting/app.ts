import UsersTableSorter from './controllers/users-table-sorter';

document.addEventListener('DOMContentLoaded', () => {
    // Check if the table exists on the current page before running
    if (document.getElementById('sortableTable')) {
        new UsersTableSorter('sortableTable');
    }
});