import { Card, Flex, Heading, Text } from "@radix-ui/themes";

export default function ProductPricingForm() {
    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    Pricing
                </Heading>

                <Text color="gray">
                    Product pricing configuration.
                </Text>

                {/*
                    Base Price
                    Sale Price
                    Currency
                    Tax Class
                */}
            </Flex>
        </Card>
    );
}