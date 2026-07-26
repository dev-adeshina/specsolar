import { Card, Flex, Heading, Text } from "@radix-ui/themes";

export default function ProductSeoForm() {
    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    SEO
                </Heading>

                <Text color="gray">
                    Search engine optimization.
                </Text>

                {/*
                    Meta Title

                    Meta Description

                    Meta Keywords

                    Open Graph Image
                */}
            </Flex>
        </Card>
    );
}