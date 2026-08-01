import { Form , usePage} from "@inertiajs/react";
import { store } from "@/routes/price";
import { Card, Flex, Heading, Text } from "@radix-ui/themes";


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


type Product = {
    id: number;
    name: string;
};

type PageProps = {
    products: Product[];
};

const PRICE_TYPES = [
    { value: "regular", label: "Regular Price" },
    { value: "sale", label: "Sale Price" },
    { value: "wholesale", label: "Wholesale Price" },
];

const CURRENCIES = [
    { value: "USD", label: "USD ($)" },
    { value: "EUR", label: "EUR (€)" },
    { value: "NGN", label: "NGN (₦)" },
];

export default function ProductPricingForm() {
    const { products } = usePage<PageProps>().props;
    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    Pricing
                </Heading>

                <Text color="gray">
                    Product pricing configuration.
                </Text>

               <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">

                <div className="grid gap-8 md:grid-cols-8">

                    <div className="col-span-8 rounded-xl border p-5">

                        <Form
                            {...store.form()}
                            disableWhileProcessing
                            resetOnSuccess={[
                                "product_id",
                                "currency",
                                "price_type",
                                "amount",
                                "starts_at",
                                "ends_at",
                            ]}
                            className="flex flex-col gap-6"
                        >
                            {({ processing, errors }) => (
                                <>
                                    <div className="space-y-6">
                                        <div className='grid gap-8 md:grid-cols-8 w-full'>
                                            
                                            <div className="grid gap-2 col-span-3">
                                                <Label>Product</Label>

                                                <Select name="product_id">
                                                    <SelectTrigger>
                                                        <SelectValue placeholder="Select Product" />
                                                    </SelectTrigger>

                                                    <SelectContent className="w-full">
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
                                                <Label>Currency</Label>

                                                <Select name="currency">
                                                    <SelectTrigger>
                                                        <SelectValue placeholder="Currency" />
                                                    </SelectTrigger>

                                                    <SelectContent>
                                                        {CURRENCIES.map(currency => (
                                                            <SelectItem
                                                                key={currency.value}
                                                                value={currency.value}
                                                            >
                                                                {currency.label}
                                                            </SelectItem>
                                                        ))}
                                                    </SelectContent>
                                                </Select>

                                                <InputError message={errors.currency} />
                                            </div>
                                            
                                            
                                            <div className="grid gap-2 col-span-3">
                                                <Label>Price Type</Label>

                                                <Select name="price_type">
                                                    <SelectTrigger>
                                                        <SelectValue placeholder="Price Type" />
                                                    </SelectTrigger>

                                                    <SelectContent>
                                                        {PRICE_TYPES.map(type => (
                                                            <SelectItem
                                                                key={type.value}
                                                                value={type.value}
                                                            >
                                                                {type.label}
                                                            </SelectItem>
                                                        ))}
                                                    </SelectContent>
                                                </Select>

                                                <InputError message={errors.price_type} />
                                            </div>
                                            
                                        </div>

                                        

                                        <div className="grid gap-2">
                                            <Label>Amount</Label>

                                            <Input
                                                type="number"
                                                step="0.01"
                                                name="amount"
                                                placeholder="0.00"
                                            />

                                            <InputError message={errors.amount} />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label>Starts At</Label>

                                            <Input
                                                type="datetime-local"
                                                name="starts_at"
                                            />

                                            <InputError message={errors.starts_at} />
                                        </div>

                                        <div className="grid gap-2">
                                            <Label>Ends At</Label>

                                            <Input
                                                type="datetime-local"
                                                name="ends_at"
                                            />

                                            <InputError message={errors.ends_at} />
                                        </div>

                                    </div>

                                    <Button
                                        type="submit"
                                        disabled={processing}
                                    >
                                        {processing && <Spinner />}

                                        Create Product Price
                                    </Button>
                                </>
                            )}
                        </Form>

                    </div>

                    

                </div>
              </div>
            </Flex>
        </Card>
    );
}