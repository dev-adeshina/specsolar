import { ReactNode } from "react";

export interface FormTabsProps {
    defaultValue: string;
    children: ReactNode;
    className?: string;
}

export interface FormTabListProps {
    children: ReactNode;
    className?: string;
}

export interface FormTabTriggerProps {
    value: string;
    children: ReactNode;
    disabled?: boolean;
    className?: string;
}

export interface FormTabContentProps {
    value: string;
    children: ReactNode;
    className?: string;
}