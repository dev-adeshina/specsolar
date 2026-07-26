import { Head, Form } from '@inertiajs/react';
import { admin_dashboard } from '@/routes';
import { categories } from '@/routes/catalog';
import { create as store } from '@/routes/categories'
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { TextArea } from '@/components/ui/text-area';
import { Label } from '@/components/ui/label';
import InputError from '@/components/input-error';
import { Spinner } from '@/components/ui/spinner';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { usePage } from '@inertiajs/react';
import {  ImageUpload } from '@/components/ui/image';
import {
    BookOpen,
    FolderGit2,
    LayoutGrid,
    Camera,
    Package,
    Tag,
    Settings,
    Home,
    User,
} from "lucide-react";

import type { TableColumn } from "react-data-table-component";


import { DataTable } from '@/components/data-table';
import type { Category } from "@/types/admin";

const ICONS = [
    { name: "BookOpen", Icon: BookOpen },
    { name: "FolderGit2", Icon: FolderGit2 },
    { name: "LayoutGrid", Icon: LayoutGrid },
    { name: "Camera", Icon: Camera },
    { name: "Package", Icon: Package },
    { name: "Tag", Icon: Tag },
    { name: "Settings", Icon: Settings },
    { name: "Home", Icon: Home },
    { name: "User", Icon: User },
];

const STATUS = [
    {name: "activate"},
    {name: "paused"}
];



type PageProps = {
    categories: Category[];
}


type Data = {
    id: number;
    name: string;
    role: any;
    salary: number
}

type Columns = {
    name: String;
    selector: (row: Data) => string | number | any;
    sortable?: boolean | any;
    right?: boolean | any;
}





export default function Categories() {
     const { categories } = usePage<PageProps>().props;

     const columns: TableColumn<Category>[] = [
    {
        name: "Name",
        selector: row => row.name,
        sortable: true,
    },

    {
        name: "Slug",
        selector: row => row.slug,
        sortable: true,
    },

    {
        name: "Parent",
        selector: row =>
            row.parent_id ? row.parent_id.toString() : "-",
    },

    {
        name: "Icon",
        selector: row => row.icon,
    },

    {
        name: "Status",
        cell: row => (
            <span
                className={
                    row.status
                        ? "text-green-600 font-medium"
                        : "text-red-600 font-medium"
                }
            >
                {row.status ? "Active" : "Inactive"}
            </span>
        ),
    },

    {
        name: "Image",
        cell: row => (
            <img
                src={row.image}
                alt={row.name}
                className="h-10 w-10 rounded object-cover"
            />
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
            <Head title="Categories" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-8 md:grid-cols-8">
                    <div className="relative col-span-3 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                                <Form {
                                    ...store.form()}
                                    resetOnSuccess={['name', 'slug', 'description', 'image', 'icon', 'status']}
                                    disableWhileProcessing
                                    className="flex flex-col gap-6"
                                >
                                    {({ processing, errors }) => (
                                        <>
                                            <div className="grid gap-6 md:grid-cols-2">
                                                <div className="grid gap-2">
                                                    <Label htmlFor="parent_id">Parent</Label>
                                                    <Select name="parent_id">
                                                        <SelectTrigger className="w-full">
                                                            <SelectValue placeholder="Select a parent" />
                                                        </SelectTrigger>
                                                        <SelectContent>
                                                            {categories?.map((category) => (
                                                                <SelectItem
                                                                    key={category.id}
                                                                    value={String(category.id)}
                                                                >
                                                                    {category?.name}
                                                                </SelectItem>
                                                            ))}
                                                        </SelectContent>
                                                    </Select>
                                                    <InputError
                                                        message={errors.paranet_id}
                                                        className="mt-2"
                                                    />
                                                </div>


                                                <div className="grid gap-2">
                                                    <Label htmlFor="name">Category Name</Label>
                                                    <Input
                                                        id="name"
                                                        type="text"
                                                        required
                                                        autoFocus
                                                        tabIndex={1}
                                                        autoComplete="name"
                                                        name="name"
                                                        placeholder="Category name"
                                                    />
                                                    <InputError
                                                        message={errors.name}
                                                        className="mt-2"
                                                    />
                                                </div>

                                                <div className="grid gap-2">
                                                    <Label htmlFor="slug">slug</Label>
                                                    <Input
                                                        id="slug"
                                                        type="text"
                                                        required
                                                        autoFocus
                                                        tabIndex={1}
                                                        autoComplete="slug"
                                                        name="slug"
                                                        placeholder="Slug"
                                                    />
                                                    <InputError
                                                        message={errors.slug}
                                                        className="mt-2"
                                                    />
                                                </div>

                                                <div className="grid gap-2">
                                                    <Label htmlFor="description">description</Label>
                                                    <TextArea
                                                        id="description"
                                                        rows={8}
                                                        cols={6}
                                                        required
                                                        autoFocus
                                                        tabIndex={1}
                                                        autoComplete="description"
                                                        name="description"
                                                        placeholder="Description"
                                                    />
                                                    <InputError
                                                        message={errors.description}
                                                        className="mt-2"
                                                    />
                                                </div>

                                                <div className="grid gap-2">
                                                    <Label htmlFor="icon">icon</Label>
                                                    <Select name="icon">
                                                        <SelectTrigger className="w-full">
                                                            <SelectValue placeholder="Select an icon" />
                                                        </SelectTrigger>
                                                        <SelectContent>
                                                            {ICONS.map(({ name, Icon }) => (
                                                                <SelectItem
                                                                    key={name}
                                                                    value={name}
                                                                >
                                                                    <div className="flex items-center gap-2">
                                                                        <Icon className="size-4" />
                                                                        <span>{name}</span>
                                                                    </div>
                                                                </SelectItem>
                                                            ))}
                                                        </SelectContent>
                                                    </Select>
                                                    <InputError
                                                        message={errors.paranet_id}
                                                        className="mt-2"
                                                    />
                                                    <InputError
                                                        message={errors.name}
                                                        className="mt-2"
                                                    />
                                                </div>

                                                <div className="grid gap-2">
                                                    <Label htmlFor="icon">Status</Label>
                                                    <Select name="status">
                                                        <SelectTrigger className="w-full">
                                                            <SelectValue placeholder="Select Status" />
                                                        </SelectTrigger>
                                                        <SelectContent>
                                                            {STATUS.map(({ name }) => (
                                                                <SelectItem
                                                                    key={name}
                                                                    value={name}
                                                                >
                                                                    <div className="flex items-center gap-2">
                                                                        
                                                                        <span>{name}</span>
                                                                    </div>
                                                                </SelectItem>
                                                            ))}
                                                        </SelectContent>
                                                    </Select>
                                                    <InputError
                                                        message={errors.paranet_id}
                                                        className="mt-2"
                                                    />
                                                    <InputError
                                                        message={errors.name}
                                                        className="mt-2"
                                                    />
                                                </div>

                                                <div className="grid gap-2">
                                                    <Label htmlFor="image">Image</Label>
                                                    <ImageUpload 
                                                        name="image" 
                                                        required
                                                        accept=".jpg,.jpeg,.png,.webp"
                                                        className="h-48 w-full" 
                                                    />
                                                    <InputError
                                                        message={errors.image}
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
                                                    Create Category 
                                                </Button>
                                            </div>
                                        </>
                                    )}
                                </Form>
                    </div>
                    <div className="relative col-span-5 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        
                        <DataTable columns={columns} data={categories} pagination />
                    </div>
                    
                </div>
                
            </div>
        </>
    );
}

Categories.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: admin_dashboard(),
        },
        {
            title: 'Catalog',
            href: categories(),
        },
        {
            title: 'Categories',
            href: categories(),
        },

    ],
};