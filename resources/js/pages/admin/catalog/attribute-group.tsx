import { Head, Form } from '@inertiajs/react';
import { admin_dashboard } from '@/routes';
import { attributeGroup, categories } from '@/routes/catalog';


import InputError from "@/components/input-error";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Spinner } from "@/components/ui/spinner";



// import { catalog } from "@/routes";
// import { attributeGroups } from "@/routes/catalog";
import { create as store } from "@/routes/attribute-group";

export default function AttributeGroup() {

    return (
        <>
            <Head title="Attribute Group" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-8 md:grid-cols-8">
                    <div className="relative col-span-3 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                         <Form
                            {...store.form()}
                            resetOnSuccess={[
                                "name",
                                "sort_order",
                            ]}
                            disableWhileProcessing
                            className="flex flex-col gap-6"
                        >
                            {({ processing, errors }) => (
                                <>
                                    <div className="space-y-6">

                                        <div className="grid gap-2">
                                            <Label htmlFor="name">
                                                Name
                                            </Label>

                                            <Input
                                                id="name"
                                                name="name"
                                                type="text"
                                                required
                                                autoFocus
                                                placeholder="Size"
                                            />

                                            <InputError
                                                message={errors.name}
                                            />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label htmlFor="sort_order">
                                                Sort Order
                                            </Label>

                                            <Input
                                                id="sort_order"
                                                name="sort_order"
                                                type="number"
                                                min={0}
                                                placeholder="0"
                                            />

                                            <InputError
                                                message={errors.sort_order}
                                            />
                                        </div>

                                    </div>

                                    <Button
                                        type="submit"
                                        disabled={processing}
                                    >
                                        {processing && <Spinner />}

                                        Create Attribute Group
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

AttributeGroup.layout = {
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
            title: 'Attribute Group',
            href: attributeGroup(),
        },
        
    ],
};