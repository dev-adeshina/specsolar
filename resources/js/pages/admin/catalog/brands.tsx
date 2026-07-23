import { Head, Form } from '@inertiajs/react';
import InputError from "@/components/input-error";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Spinner } from '@/components/ui/spinner';
import { TextArea } from "@/components/ui/text-area";
import { admin_dashboard } from '@/routes';
import { brands, categories } from '@/routes/catalog';
import { create as store } from '@/routes/brands';
import { ImageUpload } from '@/components/ui/image';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";

const STATUS = [
    { name: "Active" },
    { name: "Inactive" },
];

export default function Brands() {

    return (
        <>
            <Head title="Brands" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-8 md:grid-cols-8">
                    <div className="relative col-span-3 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <Form
                        {...store.form()}
                        resetOnSuccess={[
                            "name",
                            "slug",
                            "logo",
                            "website",
                            "country",
                            "description",
                            "status",
                        ]}
                        disableWhileProcessing
                        className="flex flex-col gap-6"
                    >
                        {({ processing, errors }) => (
                            <>
                                <div className="grid gap-6 md:grid-cols-2">

                                    {/* Left Column */}
                                    <div className="space-y-6">

                                        <div className="grid gap-2">
                                            <Label htmlFor="name">
                                                Brand Name
                                            </Label>

                                            <Input
                                                id="name"
                                                name="name"
                                                type="text"
                                                required
                                                autoFocus
                                                autoComplete="name"
                                                placeholder="Apple"
                                            />

                                            <InputError
                                                message={errors.name}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="slug">
                                                Slug
                                            </Label>

                                            <Input
                                                id="slug"
                                                name="slug"
                                                type="text"
                                                required
                                                autoComplete="slug"
                                                placeholder="apple"
                                            />

                                            <InputError
                                                message={errors.slug}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="website">
                                                Website
                                            </Label>

                                            <Input
                                                id="website"
                                                name="website"
                                                type="url"
                                                autoComplete="url"
                                                placeholder="https://apple.com"
                                            />

                                            <InputError
                                                message={errors.website}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="country">
                                                Country
                                            </Label>

                                            <Input
                                                id="country"
                                                name="country"
                                                type="text"
                                                placeholder="United States"
                                            />

                                            <InputError
                                                message={errors.country}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="status">
                                                Status
                                            </Label>

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
                                                            {name}
                                                        </SelectItem>
                                                    ))}
                                                </SelectContent>
                                            </Select>

                                            <InputError
                                                message={errors.status}
                                            />
                                        </div>

                                    </div>

                                    {/* Right Column */}

                                    <div className="space-y-6">

                                        <div className="grid gap-2">
                                            <Label htmlFor="logo">
                                                Brand Logo
                                            </Label>

                                            <ImageUpload
                                                name="logo"
                                                required
                                                accept=".jpg,.jpeg,.png,.webp"
                                                className="h-48 w-full"
                                            />

                                            <InputError
                                                message={errors.logo}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="description">
                                                Description
                                            </Label>

                                            <TextArea
                                                id="description"
                                                name="description"
                                                rows={10}
                                                placeholder="Describe this brand..."
                                            />

                                            <InputError
                                                message={errors.description}
                                            />
                                        </div>

                                    </div>

                                </div>

                                <Button
                                    type="submit"
                                    className="mt-2 w-full"
                                    disabled={processing}
                                >
                                    {processing && <Spinner />}

                                    Create Brand
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


Brands.layout = {
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
            title: 'Brands',
            href: brands(),
        },
        
    ],
};