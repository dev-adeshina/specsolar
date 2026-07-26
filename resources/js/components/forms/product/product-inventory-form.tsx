import { Card, Flex, Heading, Text } from "@radix-ui/themes";

export default function ProductInventoryForm() {
    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    Inventory
                </Heading>

                <Text color="gray">
                    Product inventory configuration.
                </Text>

                {/*
                    Warehouse
                    Stock
                    Low Stock Alert
                    Backorders
                */}
            </Flex>
        </Card>
    );
}