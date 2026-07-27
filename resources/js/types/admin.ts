
// types.ts

export interface Role {
    id: number;
    name: string;
    guard_name: string;
}

export interface Permission {
    id: number;
    name: string;
    guard_name: string;
}

export interface Staffing {
    id: number;
    portal_id: number;
    name: string;
    email: string;
    phone: string;

    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
    two_factor_confirmed_at: string | null;

    roles: Role[];
    permissions: Permission[];
}

export interface Category {
    id: number;
    parent_id: number | null;

    name: string;
    slug: string;
    description: string;

    icon: string;
    image: string;

    sort_order: number | string;
    status: boolean;

    created_at: string;
    updated_at: string;
}


export interface Brand {
    id: number;

    name: string;
    slug: string;

    logo: string | null;

    website: string | null;

    country: string | null;

    description: string | null;

    status: boolean;

    created_at: string;
    updated_at: string;
}


export interface ProductType {
    id: number;
    name: string;
    slug: string;
    description: string;

}


export interface AttributeGroup {
    id: number;
    name: string;
    sort_order: number;
}