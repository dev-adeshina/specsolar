import { Head, Form } from '@inertiajs/react';
import { admin_dashboard } from '@/routes';
import { attribute, attributeGroup, categories } from '@/routes/catalog';


import InputError from "@/components/input-error";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Spinner } from "@/components/ui/spinner";

import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";

import { Checkbox } from "@/components/ui/checkbox";
import { create as store } from "@/routes/attribute";
import { usePage } from '@inertiajs/react';
import type { AttributeGroup } from "@/types/admin";


const DATA_TYPES = [
    "text",
    "textarea",
    "number",
    "decimal",
    "boolean",
    "date",
    "datetime",
    "color",
    "select",
    "multiselect",
];


const ATTRIBUTE_DATA_TYPES = [
    { value: "text", label: "Text" },
    { value: "number", label: "Number" },
    { value: "boolean", label: "Yes / No" },
    { value: "select", label: "Select List" },
];  


type Props = {
    attributeGroups: {
        id: number;
        name: string;
    }[];
};

type PageProps = {
    attributeGroup: AttributeGroup[];
}

export default function Attribute({ attributeGroups }: Props) {
      const { attributeGroup } = usePage<PageProps>().props;
    return (
        <>
            <Head title="Attribute" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-8 md:grid-cols-8">
                    <div className="relative col-span-3 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                       <Form
                            {...store.form()}
                            resetOnSuccess={[
                                "attribute_group_id",
                                "name",
                                "slug",
                                "data_type",
                                "unit",
                                "is_filterable",
                                "is_searchable",
                                "sort_order",
                            ]}
                            disableWhileProcessing
                            className="flex flex-col gap-6"
                        >
                            {({ processing, errors }) => (
                                <>
                                    <div className="space-y-6">

                                        <div className="grid gap-2">
                                            <Label>Attribute Group</Label>

                                            <Select name="attribute_group_id">
                                                <SelectTrigger>
                                                    <SelectValue placeholder="Select Attribute Group" />
                                                </SelectTrigger>

                                                <SelectContent>
                                                    {attributeGroups.map(group => (
                                                        <SelectItem
                                                            key={group.id}
                                                            value={group.id.toString()}
                                                        >
                                                            {group.name}
                                                        </SelectItem>
                                                    ))}
                                                </SelectContent>
                                            </Select>

                                            <InputError message={errors.attribute_group_id} />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label>Name</Label>

                                            <Input
                                                name="name"
                                                placeholder="Color"
                                            />

                                            <InputError message={errors.name} />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label>Slug</Label>

                                            <Input
                                                name="slug"
                                                placeholder="color"
                                            />

                                            <InputError message={errors.slug} />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label>Data Type</Label>

                                            <Select name="data_type">
                                                <SelectTrigger>
                                                    <SelectValue placeholder="Select Data Type" />
                                                </SelectTrigger>

                                                <SelectContent>
                                                    {ATTRIBUTE_DATA_TYPES.map(({ value, label }) => (
                                                        <SelectItem
                                                            key={value}
                                                            value={value}
                                                        >
                                                            {label}
                                                        </SelectItem>
                                                    ))}
                                                </SelectContent>
                                            </Select>

                                            <InputError message={errors.data_type} />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label>Unit</Label>

                                            <Input
                                                name="unit"
                                                placeholder="kg, cm, GB..."
                                            />

                                            <InputError message={errors.unit} />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label>Sort Order</Label>

                                            <Input
                                                type="number"
                                                name="sort_order"
                                            />

                                            <InputError message={errors.sort_order} />
                                        </div>

                                        <div className="flex items-center justify-between rounded-lg border p-3">
                                            <Label htmlFor="is_filterable">
                                                Filterable
                                            </Label>

                                            <Checkbox
                                                id="is_filterable"
                                                name="is_filterable"
                                            />
                                        </div>

                                        <div className="flex items-center justify-between rounded-lg border p-3">
                                            <Label htmlFor="is_searchable">
                                                Searchable
                                            </Label>

                                            <Checkbox
                                                id="is_searchable"
                                                name="is_searchable"
                                            />
                                        </div>

                                    </div>

                                    <Button
                                        type="submit"
                                        disabled={processing}
                                    >
                                        {processing && <Spinner />}

                                        Create Attribute
                                    </Button>
                                </>
                            )}
                        </Form>

                    </div>
                    <div className="relative col-span-5 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    </div>
                </div>
                
            </div>
        </>
    );
}

Attribute.layout = {
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
            title: 'Attribute',
            href: attribute(),
        },
        
    ],
};