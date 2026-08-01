import { Form, usePage } from "@inertiajs/react";
import { store } from "@/routes/seo";

import { Card, Flex, Heading, Text } from "@radix-ui/themes";

import InputError from "@/components/input-error";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Spinner } from "@/components/ui/spinner";
import { TextArea } from '@/components/ui/text-area';
// import { Textarea } from "@/components/ui/textarea";


type Product = {
    id: number;
    name: string;
};

type PageProps = {
    products: Product[];
};

export default function ProductSeoForm() {

    const { products } = usePage<PageProps>().props;
    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    SEO
                </Heading>

                <Text color="gray">
                    Search engine optimization.
                </Text>

               <div className="col-span-5 rounded-xl border p-6">

                        <Form
                            {...store.form()}
                            disableWhileProcessing
                            resetOnSuccess={[
                                "product_id",
                                "meta_title",
                                "meta_description",
                                "keywords",
                                "canonical_url",
                            ]}
                            className="flex flex-col gap-6"
                        >
                            {({ processing, errors }) => (
                                <>

                                    <div className="grid gap-2">
                                        <Label>
                                            Product
                                        </Label>

                                        <select
                                            name="productId"
                                            className="h-10 rounded-md border px-3"
                                        >
                                            <option value="">
                                                Select Product
                                            </option>

                                            {products.map(product => (
                                                <option
                                                    key={product.id}
                                                    value={product.id}
                                                >
                                                    {product.name}
                                                </option>
                                            ))}
                                        </select>

                                        <InputError message={errors.product_id} />
                                    </div>

                                    <div className="grid gap-2">

                                        <Label>
                                            SEO Title
                                        </Label>

                                        <Input
                                            name="meta_title"
                                            placeholder="Jinko Solar Panel 550W | My Company"
                                        />

                                        <InputError message={errors.meta_title} />

                                    </div>

                                    <div className="grid gap-2">

                                        <Label>
                                            Meta Description
                                        </Label>

                                        <TextArea
                                            rows={5}
                                            name="meta_description"
                                            placeholder="Describe this product for search engines..."
                                        />

                                        <InputError message={errors.meta_description} />

                                    </div>

                                    <div className="grid gap-2">

                                        <Label>
                                            Keywords
                                        </Label>

                                        <Input
                                            name="keywords"
                                            placeholder="solar panel, jinko, 550w, photovoltaic"
                                        />

                                        <Text size="1" color="gray">
                                            Separate keywords with commas.
                                        </Text>

                                        <InputError message={errors.keywords} />

                                    </div>

                                    <div className="grid gap-2">

                                        <Label>
                                            Canonical URL
                                        </Label>

                                        <Input
                                            name="canonical_url"
                                            placeholder="https://example.com/products/jinko-550w"
                                        />

                                        <InputError message={errors.canonical_url} />

                                    </div>

                                    <Button
                                        type="submit"
                                        disabled={processing}
                                    >
                                        {processing && <Spinner />}

                                        Save SEO
                                    </Button>

                                </>
                            )}
                        </Form>

                    </div>
            </Flex>
        </Card>
    );
}