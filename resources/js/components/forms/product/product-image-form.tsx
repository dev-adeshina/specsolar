import { Form, usePage } from "@inertiajs/react";
import { store } from "@/routes/image";
import {  ImageUpload } from '@/components/ui/image';

import { Card, Flex, Heading, Text } from "@radix-ui/themes";


import InputError from "@/components/input-error";
import { Button } from "@/components/ui/button";
import { Checkbox } from "@/components/ui/checkbox";
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


type Product = {
    id: number;
    name: string;
};

type PageProps = {
    products: Product[];
};

export default function ProductImagesForm() {
    const { products } = usePage<PageProps>().props;

    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    Images
                </Heading>

                <Text color="gray">
                    Upload product images.
                </Text>

                <div className="col-span-8 rounded-xl border p-5">

                            <Form
                                {...store.form()}
                                encType="multipart/form-data"
                                disableWhileProcessing
                                resetOnSuccess={[
                                    "product_id",
                                    "image",
                                    "alt_text",
                                    "sort_order",
                                    "is_primary",
                                ]}
                                className="flex flex-col gap-6"
                            >
                                {({ processing, errors }) => (
                                    <>
                                        <div className="space-y-6">

                                            <div className="grid gap-8 md:grid-cols-8">

                                                <div className="grid gap-2 col-span-4">
                                                    <Label>Product</Label>

                                                    <Select name="product_id">
                                                        <SelectTrigger>
                                                            <SelectValue placeholder="Select Product" />
                                                        </SelectTrigger>

                                                        <SelectContent>
                                                            {products.map(product => (
                                                                <SelectItem
                                                                    key={product.id}
                                                                    value={product.id.toString()}
                                                                >
                                                                    {product.name}
                                                                </SelectItem>
                                                            ))}
                                                        </SelectContent>
                                                    </Select>

                                                    <InputError message={errors.product_id} />
                                                </div>

                                                <div className="grid gap-2 col-span-2">
                                                    <Label>Sort Order</Label>

                                                    <Input
                                                        type="number"
                                                        name="sort_order"
                                                        defaultValue={0}
                                                    />

                                                    <InputError message={errors.sort_order} />
                                                </div>

                                                <div className="col-span-2 flex items-end">
                                                    <div className="flex items-center justify-between rounded-lg border p-4 w-full">
                                                        <Label htmlFor="is_primary">
                                                            Primary Image
                                                        </Label>

                                                        <Checkbox
                                                            id="is_primary"
                                                            name="is_primary"
                                                        />
                                                    </div>
                                                </div>

                                            </div>

                                            {/* <div className="grid gap-2">
                                                <Label>Image</Label>

                                                <Input
                                                    type="file"
                                                    name="image"
                                                    accept="image/*"
                                                />

                                                <InputError message={errors.image} />
                                            </div> */}

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

                                            <div className="grid gap-2">
                                                <Label>Alt Text</Label>

                                                <Input
                                                    name="alt_text"
                                                    placeholder="Front view of Jinko Solar Panel 550W"
                                                />

                                                <InputError message={errors.alt_text} />
                                            </div>

                                        </div>

                                        <Button
                                            type="submit"
                                            disabled={processing}
                                        >
                                            {processing && <Spinner />}

                                            Upload Image
                                        </Button>

                                    </>
                                )}
                            </Form>

                        </div>
            </Flex>
        </Card>
    );
}