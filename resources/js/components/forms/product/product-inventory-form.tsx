import { Form, usePage } from "@inertiajs/react";
import { store } from "@/routes/inventory";
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

export default function ProductInventoryForm() {
    const { products } = usePage<PageProps>().props;

    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    Inventory
                </Heading>

                <Text color="gray">
                    Product inventory configuration.
                </Text>

                <div className="col-span-8 rounded-xl border p-5">

                            <Form
                                {...store.form()}
                                disableWhileProcessing
                                resetOnSuccess={[
                                    "product_id",
                                    "quantity",
                                    "low_stock_threshold",
                                    "track_inventory",
                                    "allow_backorders",
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
                                                    <Label>Quantity</Label>

                                                    <Input
                                                        type="number"
                                                        name="quantity"
                                                        min="0"
                                                        placeholder="0"
                                                    />

                                                    <InputError message={errors.quantity} />
                                                </div>

                                                <div className="grid gap-2 col-span-2">
                                                    <Label>Low Stock Alert</Label>

                                                    <Input
                                                        type="number"
                                                        name="low_stock_threshold"
                                                        min="0"
                                                        placeholder="5"
                                                    />

                                                    <InputError message={errors.low_stock_threshold} />
                                                </div>

                                            </div>

                                            <div className="grid gap-4 md:grid-cols-2">

                                                <div className="flex items-center justify-between rounded-lg border p-4">
                                                    <Label htmlFor="track_inventory">
                                                        Track Inventory
                                                    </Label>

                                                    <Checkbox
                                                        id="track_inventory"
                                                        name="track_inventory"
                                                    />
                                                </div>

                                                <div className="flex items-center justify-between rounded-lg border p-4">
                                                    <Label htmlFor="allow_backorders">
                                                        Allow Backorders
                                                    </Label>

                                                    <Checkbox
                                                        id="allow_backorders"
                                                        name="allow_backorders"
                                                    />
                                                </div>

                                            </div>

                                        </div>

                                        <Button
                                            type="submit"
                                            disabled={processing}
                                        >
                                            {processing && <Spinner />}

                                            Save Inventory
                                        </Button>

                                    </>
                                )}
                            </Form>

                        </div>
            </Flex>
        </Card>
    );
}