// Typescript ^5.9.3

export default class UsersTableSorter {
    private table: HTMLTableElement;
    private tbody: HTMLTableSectionElement;

    constructor(tableId: string) {
        const el = document.getElementById(tableId);
        if (!(el instanceof HTMLTableElement)) {
            throw new Error(`Element with id "${tableId}" not found or is not a table.`);
        }
        this.table = el;
        this.tbody = this.table.querySelector('tbody') as HTMLTableSectionElement;
        
        if (!this.tbody) {
            throw new Error("Table must have a <tbody> element.");
        }
        
        this.init();

        // TRIGGER INITIAL SORT:
        const firstHeader = this.table.querySelector('th.users-header');
        if (firstHeader) {
            this.sortColumn(0, firstHeader, true); // index 0, the header element, and forceAsc = true
        }
    }

    private init() {
        const headers = this.table.querySelectorAll('th.users-header');
        console.log('Initializing headers for sorting', this.table);
        console.log('headers', headers);
        headers.forEach((header, index) => {
            // Ensure the header looks clickable
            (header as HTMLElement).style.cursor = 'pointer';
            header.addEventListener('click', () => this.sortColumn(index, header));
        });
    }

    private sortColumn(index: number, header: Element, forceAsc: boolean = false) {
        // Logic: If forceAsc is true, we treat it as if it's NOT already sorted (so it becomes 'asc')
        const isAsc = forceAsc ? false : header.classList.contains('asc');
        const rows = Array.from(this.tbody.querySelectorAll('tr'));

        rows.sort((rowA, rowB) => {
            const cellA = rowA.children[index].textContent?.trim() || '';
            const cellB = rowB.children[index].textContent?.trim() || '';

            const valA = isNaN(Number(cellA)) || cellA === '' ? cellA.toLowerCase() : Number(cellA);
            const valB = isNaN(Number(cellB)) || cellB === '' ? cellB.toLowerCase() : Number(cellB);

            if (valA < valB) return isAsc ? 1 : -1;
            if (valA > valB) return isAsc ? -1 : 1;
            return 0;
        });

        // Toggle classes for ▲▼ pseudo-elements
        this.table.querySelectorAll('th').forEach(th => th.classList.remove('asc', 'desc'));
        header.classList.add(isAsc ? 'desc' : 'asc');

        // Re-append to DOM
        rows.forEach(row => this.tbody.appendChild(row));
    }
}