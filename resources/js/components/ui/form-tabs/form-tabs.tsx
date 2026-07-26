import * as Tabs from "@radix-ui/react-tabs";

import { cn } from "@/lib/utils";

import type { FormTabsProps } from "./types";

export default function FormTabs({
    defaultValue,
    children,
    className,
}: FormTabsProps) {
    return (
        <Tabs.Root
            defaultValue={defaultValue}
            className={cn("w-full", className)}
        >
            {children}
        </Tabs.Root>
    );
}