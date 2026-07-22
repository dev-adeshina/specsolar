import { Head, Form } from '@inertiajs/react';
import { admin_dashboard } from '@/routes';
import { index as staff, store } from '@/routes/staff';
import InputError from '@/components/input-error';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { usePage } from '@inertiajs/react';
import { Badge } from '@/components/ui/badge';
import { useState, ReactNode } from "react";
import { DataTable } from '@/components/data-table';
import { TableColumn } from "react-data-table-component";
import type { Staffing } from '@/types/admin';


type Portal = {
    id: number;
    name: string;
};

interface Role  {
    id: number;
    name: string;
    guard_name?: string;
}

interface Permission   {
    id: number;
    name: string;
    guard_name?: string;
}



type DataTableColumn<T> = {
    title: string;
    key?: keyof T | string;
    selector?: (row: T) => ReactNode;
    render?: (row: T) => ReactNode;
    sortable?: boolean;
    searchable?: boolean;
    hidden?: boolean;
    width?: string | number;
    className?: string;
    headerClassName?: string;
    right?: boolean;
};

type Props = {
    status?: string;
};

type PageProps = {
    portals: Portal[];
    roles: Role[];
    permissions: Permission[];
    staffing: Staffing[]; 
};



type DataTableProps<T extends { id: number | string }> = {
    columns: DataTableColumn<T>[];
    data: T[];
    rowKey?: keyof T;
};


export default function Staff({status}: Props) 
{
    const { portals, roles, permissions, staffing } = usePage<PageProps>().props;
    const [selectedPermissions, setSelectedPermissions] = useState<number[]>([]);

    const togglePermission = (id: number) => {
        setSelectedPermissions((current) =>
            current.includes(id)
                ? current.filter((permissionId) => permissionId !== id)
                : [...current, id]
        );
    };

    const columns: TableColumn<Staffing>[] = [
    {
        name: "Name",
        selector: row => row.name,
        sortable: true,
    },

    {
        name: "Email",
        selector: row => row.email,
        sortable: true,
    },

    {
        name: "Phone",
        selector: row => row.phone,
    },

    {
        name: "Role",
        cell: row => (
            <div className="flex gap-1 flex-wrap">
                {row.roles.map(role => (
                    <span
                        key={role.id}
                        className="rounded bg-gray-200 px-2 py-1 text-xs text-black"
                    >
                        {role.name}
                    </span>
                ))}
            </div>
        ),
    },

    {
        name: "Actions",
        right: true,
        cell: row => (
            <div className="flex gap-2">
                <Button
                    onClick={() => console.log("Edit", row.id)}
                >
                    Edit
                </Button>

                <Button
                    onClick={() => console.log("Delete", row.id)}
                >
                    Delete
                </Button>
            </div>
        ),
    },
];
    
    
    return (
        <>
            <Head title="Staffs" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-8 md:grid-cols-8">
                    <div className="relative col-span-3 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <Form
                            {...store.form()}
                            resetOnSuccess={[
                                'name',
                                'email',
                                'phone',
                                'portal_id',
                                'role',
                                'permissions',
                            ]}
                            disableWhileProcessing
                            className="flex flex-col gap-6"
                        >
                            {({ processing, errors }) => (
                                <>
                                    <div className="grid gap-6">
                                        <div className="grid gap-2">
                                            <Label htmlFor="name">Full Name</Label>
                                            <Input
                                                id="name"
                                                type="text"
                                                required
                                                autoFocus
                                                tabIndex={1}
                                                autoComplete="name"
                                                name="name"
                                                placeholder="Full name"
                                            />
                                            <InputError
                                                message={errors.name}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="email">
                                                Email address
                                            </Label>
                                            <Input
                                                id="email"
                                                type="email"
                                                required
                                                tabIndex={2}
                                                autoComplete="email"
                                                name="email"
                                                placeholder="email@example.com"
                                            />
                                            <InputError
                                                message={errors.email}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="phone">Mobile Number</Label>
                                            <Input
                                                id="phone"
                                                type="text"
                                                required
                                                autoFocus
                                                tabIndex={1}
                                                autoComplete="phone"
                                                name="phone"
                                                placeholder="Mobile"
                                            />
                                            <InputError
                                                message={errors.phone}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="name">Department</Label>
                                            <Select name="portal_id">
                                                <SelectTrigger className="w-full">
                                                    <SelectValue placeholder="Select a portal" />
                                                </SelectTrigger>

                                                <SelectContent>
                                                    {portals.map((portal) => (
                                                        <SelectItem
                                                            key={portal.id}
                                                            value={String(portal.id)}
                                                        >
                                                            {portal.name}
                                                        </SelectItem>
                                                    ))}
                                                </SelectContent>
                                            </Select>
                                            <InputError
                                                message={errors.portal_id}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="role">Role</Label>
                                            <Select name="role">
                                                <SelectTrigger className="w-full">
                                                    <SelectValue placeholder="Select a Role" />
                                                </SelectTrigger>

                                                <SelectContent>
                                                    {roles.map((role) => (
                                                        <SelectItem
                                                            key={role.id}
                                                            value={String(role.id)}
                                                        >
                                                            {role.name}
                                                        </SelectItem>
                                                    ))}
                                                </SelectContent>
                                            </Select>
                                            <InputError
                                                message={errors.role}
                                                className="mt-2"
                                            />
                                        </div>
                                        

                                        <div className="space-y-2">
                                            <Label>Permissions</Label>

                                            <div className="flex flex-wrap gap-2">
                                                {permissions.map((permission) => (
                                                    <Badge
                                                        key={permission.id}
                                                        variant={
                                                            selectedPermissions.includes(permission.id)
                                                                ? "default"
                                                                : "outline"
                                                        }
                                                        className="cursor-pointer rounded px-2 py-1 transition-colors hover:bg-primary/10"
                                                        onClick={() => togglePermission(permission.id)}
                                                    >
                                                        {permission.name}
                                                    </Badge>
                                                ))}
                                            </div>

                                            {selectedPermissions.map((id) => (
                                                <input
                                                    key={id}
                                                    type="hidden"
                                                    name="permissions[]"
                                                    value={id}
                                                />
                                            ))}

                                            <InputError
                                                message={errors.permissions}
                                                className="mt-2"
                                            />
                                        </div>
                                        

                                        <Button
                                            type="submit"
                                            className="mt-2 w-full"
                                            tabIndex={5}
                                            data-test="register-user-button"
                                        >
                                            {processing && <Spinner />}
                                            Create Staff Account
                                        </Button>
                                    </div>

                                    
                                </>
                            )}
                        </Form>

                        {status && (
                            <div className="mb-4 text-center text-sm font-medium text-green-600">
                                {status}
                            </div>
                        )}
                    </div>
                    <div className="relative col-span-5 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <div className="text-sm text-muted-foreground mb-6 px-4">
                            Want something else? {' | '}
                            <TextLink href={staff()} tabIndex={6}>
                                Check Staff Profile
                            </TextLink>
                        </div>
                       <DataTable  columns={columns}  data={staffing}  pagination striped highlightOnHover pointerOnHover />
                        

                    </div>
                </div>
            </div>
        </>
    );
}

Staff.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: admin_dashboard(),
        },
        {
            title: 'Staff',
            href: staff(),
        },
    ],
};
