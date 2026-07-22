import {Table} from "@radix-ui/themes";

export function UiTable({className, ...props}: React.ComponentProps<typeof Table.Root>) {
    return (
        <Table.Root
            variant="surface"
            className={`w-full rounded-lg overflow-hidden ${className}`}
            {...props}
        />
    );
}

export const TableHeader = Table.Header;
export const TableBody = Table.Body;
export const TableRow = Table.Row;
export const TableCell = Table.Cell;
export const TableColumnHeaderCell = Table.ColumnHeaderCell;
export const TableRowHeaderCell = Table.RowHeaderCell;