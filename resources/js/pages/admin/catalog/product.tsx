import { Head } from '@inertiajs/react';
import { admin_dashboard } from '@/routes';
import { categories, product } from '@/routes/catalog/';
import { usePage } from '@inertiajs/react';
import type { Category, Brand, ProductType } from "@/types/admin";
import { Card, Flex, Heading, Text } from "@radix-ui/themes";
import {
    FormTabs,
    FormTabList,
    FormTabTrigger,
    FormTabContent,
} from "@/components/ui/form-tabs";
import {
    ProductGeneralForm,
    ProductPricingForm,
    ProductInventoryForm,
    ProductImagesForm,
    ProductSeoForm,
} from "@/components/forms/product";


const styling = "px-4 py-3 text-sm font-medium data-[state=active]:border-b-2 data-[state=active]:border-slate-600 data-[state=active]:text-slate-600";
type PageProps = {
    categories: Category[];
    brands: Brand[]
    productTypes: ProductType[]
}

export default function Product() {
    const { categories, brands, productTypes } = usePage<PageProps>().props;
    return (
        <>
            <Head title="Product" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-8 md:grid-cols-8">
                    <div className="relative col-span-4 overflow-hidden p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <FormTabs defaultValue="general">



                            <FormTabList className="border-b border-gray-200 flex justify-item-between w-full">

                                <FormTabTrigger value="general" className={styling}>
                                    General
                                </FormTabTrigger>

                                <FormTabTrigger value="pricing" className={styling}>
                                    Pricing
                                </FormTabTrigger>

                                <FormTabTrigger value="inventory" className={styling}>
                                    Inventory
                                </FormTabTrigger>

                                <FormTabTrigger value="images" className={styling}>
                                    Images
                                </FormTabTrigger>

                                <FormTabTrigger value="seo" className={styling}>
                                    SEO
                                </FormTabTrigger>

                            </FormTabList>

                            <FormTabContent value="general">
                                <ProductGeneralForm categories={categories} brands={brands} productTypes={productTypes} />
                            </FormTabContent>

                            <FormTabContent value="pricing">
                                <ProductPricingForm />
                            </FormTabContent>

                            <FormTabContent value="inventory">
                                <ProductInventoryForm />
                            </FormTabContent>

                            <FormTabContent value="images">
                                <ProductImagesForm />
                            </FormTabContent>

                            <FormTabContent value="seo">
                                <ProductSeoForm />
                            </FormTabContent>

                        </FormTabs>
                    </div>
                    <div className="relative col-span-4 overflow-hidden  p-5 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <div className="col-span-3 space-y-6">

                            <Card>

                                <Flex direction="column" gap="2">

                                    <Heading size="3">
                                        Search Preview
                                    </Heading>

                                    <div className="rounded-lg border p-4">

                                        <p className="text-xs text-green-700">
                                            https://yourdomain.com/products/product-name
                                        </p>

                                        <h3 className="mt-1 text-lg font-medium text-blue-700">
                                            Product SEO Title
                                        </h3>

                                        <p className="mt-2 text-sm text-gray-600">
                                            Your meta description will appear here
                                            so you can preview how Google may display
                                            this product.
                                        </p>

                                    </div>

                                </Flex>

                            </Card>

                            <Card>

                                <Flex direction="column" gap="3">

                                    <Heading size="3">
                                        SEO Checklist
                                    </Heading>

                                    <ul className="space-y-2 text-sm">

                                        <li>
                                            ✅ Title between 50–60 characters
                                        </li>

                                        <li>
                                            ✅ Description between 150–160 characters
                                        </li>

                                        <li>
                                            ✅ Include primary keyword
                                        </li>

                                        <li>
                                            ✅ Avoid duplicate titles
                                        </li>

                                        <li>
                                            ✅ Add descriptive keywords
                                        </li>

                                    </ul>

                                </Flex>

                            </Card>

                        </div>
                    </div>
                </div>

            </div>
        </>
    );
}


Product.layout = {
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
            title: 'Product',
            href: product(),
        },

    ],
};