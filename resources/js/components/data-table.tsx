import * as React from "react";

import  { default as UiTable,  type TableColumn, ThemeProp,  createTheme, TableStyles } from "react-data-table-component";

createTheme('material-violet', { primary: '#8681832b' }, 'crisp');

type Props<T> = {
    columns: TableColumn<T>[];
    data: T[];
    pagination?: boolean;
    selectableRows?: boolean;
    expandableRows?: boolean;
    theme?: ThemeProp;
    animateRows?: boolean;
    columnSeparator?: boolean | "subtle" | "full";

    progressPending?: boolean;

    title?: React.ReactNode;
    actions?: React.ReactNode;
    subHeader?: boolean;
    subHeaderComponent?: React.ReactNode;

    fixedHeader?: boolean;
    fixedHeaderScrollHeight?: string;

    striped?: boolean;
    highlightOnHover?: boolean;
    pointerOnHover?: boolean;

    customStyles?: TableStyles;


};

function DataTable<T>({ columns, data, pagination}: Props<T>) {
    return <UiTable columns={columns} data={data} pagination={pagination} theme="rounded" colorMode="dark" />
}

export { DataTable}


