import * as Tabs from "@radix-ui/react-tabs";

import { cn } from "@/lib/utils";

import type { FormTabListProps } from "./types";

export default function FormTabList({
    children,
    className,
}: FormTabListProps) {
    return (
        <Tabs.List
            className={cn(className)}
        >
            {children}
        </Tabs.List>
    );
}