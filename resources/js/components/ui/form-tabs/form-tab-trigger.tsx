import * as Tabs from "@radix-ui/react-tabs";

import { cn } from "@/lib/utils";

import type { FormTabTriggerProps } from "./types";

export default function FormTabTrigger({
    value,
    children,
    disabled,
    className,
}: FormTabTriggerProps) {
    return (
        <Tabs.Trigger
            value={value}
            disabled={disabled}
            className={cn(className)}
        >
           
            {children}
            
        </Tabs.Trigger>
    );
}