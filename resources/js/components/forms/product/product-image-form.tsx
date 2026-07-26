import { Card, Flex, Heading, Text } from "@radix-ui/themes";

export default function ProductImagesForm() {
    return (
        <Card>
            <Flex direction="column" gap="4">
                <Heading size="4">
                    Images
                </Heading>

                <Text color="gray">
                    Upload product images.
                </Text>

                {/*
                    Featured Image

                    Gallery Images

                    Drag & Drop Upload
                */}
            </Flex>
        </Card>
    );
}