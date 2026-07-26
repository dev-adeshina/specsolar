import * as Tabs from "@radix-ui/react-tabs";

import { cn } from "@/lib/utils";

import type { FormTabContentProps } from "./types";

export default function FormTabContent({
    value,
    children,
    className,
}: FormTabContentProps) {
    return (
        <Tabs.Content
            value={value}
            className={cn("pt-6", className)}
        >
            {children}
        </Tabs.Content>
    );
}