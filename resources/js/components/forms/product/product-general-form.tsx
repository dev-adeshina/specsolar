import { Form } from "@inertiajs/react";
import { create as store } from "@/routes/products";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";

import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { TextArea } from '@/components/ui/text-area';
import { Label } from "@/components/ui/label";
import InputError from "@/components/input-error";
import { Spinner } from "@/components/ui/spinner";


type Category = {
    id: number;
    name: string;
};

type Brand = {
    id: number;
    name: string;
};

type ProductType = {
    id: number;
    name: string;
};

interface Props {
    categories?: Category[];
    brands?: Brand[];
    productTypes?: ProductType[];
}

import { Card, Flex, Heading, Text } from "@radix-ui/themes";

export default function ProductGeneralForm({
    categories,
    brands,
    productTypes,
    }: Props) {

  
    return (
        <Card>
            <Flex direction="column" gap="4">
                



                {/*

                Category
                Brand
                Product Type

                Name
                Slug
                SKU
                Barcode

                Short Description
                Description

                Weight
                Length
                Width
                Height

                Status
                Visibility
                Featured
                Service

                */}


                <Form
                    {...store.form()}
                    disableWhileProcessing
                    className="space-y-8"
                >
                    {({ processing, errors }) => (
                        <>
                            {/* Basic Information */}
                            <div className="space-y-4">
                                {/* <h3 className="text-lg font-semibold">
                                    Basic Information
                                </h3> */}

                                <Heading size="4">
                                    General Information
                                </Heading>

                                <div className="grid gap-6 md:grid-cols-2">

                                    <div className="grid gap-2">
                                        <Label htmlFor="category_id">
                                            Category
                                        </Label>

                                        <Select name="category_id">
                                            <SelectTrigger className="w-full">
                                                <SelectValue placeholder="Select Category" />
                                            </SelectTrigger>

                                            <SelectContent>
                                                {categories?.map((category) => (
                                                    <SelectItem
                                                        key={category.id}
                                                        value={String(category.id)}
                                                    >
                                                        {category.name}
                                                    </SelectItem>
                                                ))}
                                            </SelectContent>
                                        </Select>

                                        <InputError
                                            message={errors.category_id}
                                        />
                                    </div>

                                    <div className="grid gap-2">
                                        <Label htmlFor="brand_id">
                                            Brand
                                        </Label>

                                        <Select name="brand_id">
                                            <SelectTrigger>
                                                <SelectValue placeholder="Select Brand" />
                                            </SelectTrigger>

                                            <SelectContent>
                                                {brands?.map((brand) => (
                                                    <SelectItem
                                                        key={brand.id}
                                                        value={String(brand.id)}
                                                    >
                                                        {brand.name}
                                                    </SelectItem>
                                                ))}
                                            </SelectContent>
                                        </Select>

                                        <InputError
                                            message={errors.brand_id}
                                        />
                                    </div>

                                    <div className="grid gap-2">
                                        <Label htmlFor="product_type_id">
                                            Product Type
                                        </Label>

                                        <Select name="product_type_id">
                                            <SelectTrigger>
                                                <SelectValue placeholder="Select Product Type" />
                                            </SelectTrigger>

                                            <SelectContent>
                                                {productTypes?.map((type) => (
                                                    <SelectItem
                                                        key={type.id}
                                                        value={String(type.id)}
                                                    >
                                                        {type.name}
                                                    </SelectItem>
                                                ))}
                                            </SelectContent>
                                        </Select>

                                        <InputError
                                            message={errors.product_type_id}
                                        />
                                    </div>

                                </div>
                            </div>

                            {/* Product Information */}
                            <div className="space-y-4">

                                <h3 className="text-lg font-semibold">
                                    Product Information
                                </h3>

                                <div className="grid gap-6 md:grid-cols-2">

                                    <div className="grid gap-2">
                                        <Label htmlFor="name">
                                            Product Name
                                        </Label>

                                        <Input
                                            id="name"
                                            name="name"
                                            placeholder="Product Name"
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
                                            placeholder="Slug"
                                        />

                                        <InputError
                                            message={errors.slug}
                                        />
                                    </div>

                                    <div className="grid gap-2">
                                        <Label htmlFor="sku">
                                            SKU
                                        </Label>

                                        <Input
                                            id="sku"
                                            name="sku"
                                            placeholder="SKU"
                                        />

                                        <InputError
                                            message={errors.sku}
                                        />
                                    </div>

                                    <div className="grid gap-2">
                                        <Label htmlFor="barcode">
                                            Barcode
                                        </Label>

                                        <Input
                                            id="barcode"
                                            name="barcode"
                                            placeholder="Barcode"
                                        />

                                        <InputError
                                            message={errors.barcode}
                                        />
                                    </div>

                                </div>
                            </div>

                            {/* Description */}

                            <div className="space-y-4">

                                <h3 className="text-lg font-semibold">
                                    Description
                                </h3>

                                <div className="grid gap-6">

                                    <div className="grid gap-2">
                                        <Label htmlFor="short_description">
                                            Short Description
                                        </Label>

                                        <TextArea
                                            name="short_description"
                                            rows={3}
                                        />

                                        <InputError
                                            message={errors.short_description}
                                        />
                                    </div>

                                    <div className="grid gap-2">
                                        <Label htmlFor="description">
                                            Description
                                        </Label>

                                        <TextArea
                                            name="description"
                                            rows={8}
                                        />

                                        <InputError
                                            message={errors.description}
                                        />
                                    </div>

                                </div>
                            </div>

                            {/* Physical Attributes */}

                            <div className="space-y-4">

                                <h3 className="text-lg font-semibold">
                                    Physical Attributes
                                </h3>

                                <div className="grid gap-6 md:grid-cols-4">

                                    <Input
                                        name="weight"
                                        placeholder="Weight"
                                    />

                                    <Input
                                        name="length"
                                        placeholder="Length"
                                    />

                                    <Input
                                        name="width"
                                        placeholder="Width"
                                    />

                                    <Input
                                        name="height"
                                        placeholder="Height"
                                    />

                                </div>

                            </div>

                            {/* Product Options */}

                            <div className="space-y-4">

                                <h3 className="text-lg font-semibold">
                                    Product Options
                                </h3>

                                <div className="grid gap-6 md:grid-cols-2">

                                    <div className="grid gap-2">
                                        <Label>Status</Label>

                                        <Select name="status">
                                            <SelectTrigger>
                                                <SelectValue placeholder="Status" />
                                            </SelectTrigger>

                                            <SelectContent>
                                                <SelectItem value="active">
                                                    Active
                                                </SelectItem>

                                                <SelectItem value="draft">
                                                    Draft
                                                </SelectItem>

                                                <SelectItem value="inactive">
                                                    Inactive
                                                </SelectItem>
                                            </SelectContent>
                                        </Select>
                                    </div>

                                    <div className="grid gap-2">
                                        <Label>Visibility</Label>

                                        <Select name="visibility">
                                            <SelectTrigger>
                                                <SelectValue placeholder="Visibility" />
                                            </SelectTrigger>

                                            <SelectContent>
                                                <SelectItem value="public">
                                                    Public
                                                </SelectItem>

                                                <SelectItem value="private">
                                                    Private
                                                </SelectItem>
                                            </SelectContent>
                                        </Select>
                                    </div>

                                </div>

                            </div>

                            <Button
                                type="submit"
                                className="w-full"
                            >
                                {processing && <Spinner />}

                                Create Product
                            </Button>

                        </>
                    )}
                </Form>
            </Flex>
        </Card>
    );
}