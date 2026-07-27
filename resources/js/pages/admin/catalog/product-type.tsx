import { Head, Form } from '@inertiajs/react';


import InputError from "@/components/input-error";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Spinner } from "@/components/ui/spinner";
import { TextArea } from "@/components/ui/text-area";


import { admin_dashboard } from '@/routes';
import { categories, productType } from '@/routes/catalog';
import { create as store } from "@/routes/product-type";

export default function ProductType() {

    return (
        <>
            <Head title="Product Type" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-8 md:grid-cols-8">
                    <div className="relative col-span-3 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <Form
                            {...store.form()}
                            resetOnSuccess={[
                                "name",
                                "slug",
                                "description",
                            ]}
                            disableWhileProcessing
                            className="flex flex-col gap-6"
                        >
                            {({ processing, errors }) => (
                                <>
                                    <div className="space-y-6">

                                        <div className="grid gap-2">
                                            <Label htmlFor="name">
                                                Product Type
                                            </Label>

                                            <Input
                                                id="name"
                                                name="name"
                                                required
                                                autoFocus
                                                placeholder="Phone"
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
                                                placeholder="phone"
                                            />

                                            <InputError
                                                message={errors.slug}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="description">
                                                Description
                                            </Label>

                                            <TextArea
                                                id="description"
                                                name="description"
                                                rows={6}
                                                placeholder="Describe this product type..."
                                            />

                                            <InputError
                                                message={errors.description}
                                            />
                                        </div>

                                    </div>

                                    <Button
                                        type="submit"
                                        disabled={processing}
                                    >
                                        {processing && <Spinner />}

                                        Create Product Type
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


ProductType.layout = {
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
            title: 'Product Type',
            href: productType(),
        },
        
    ],
};