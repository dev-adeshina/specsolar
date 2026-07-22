import * as React from "react";
import { useRef, useState } from "react";
import { ImagePlus } from "lucide-react";
import { cn } from "@/lib/utils";
import { Input } from "@/components/ui/input"



interface ImageUploadProps {
    onChange?: (file: File) => void;
    defaultImage?: string;
    className?: string;
}



function ImageUpload({
    onChange,
    className,
    defaultImage,
}: ImageUploadProps) {
    const inputRef = useRef<HTMLInputElement>(null);
    const [preview, setPreview] = useState(defaultImage);

    const handleClick = () => {
        inputRef.current?.click();
    };

    const handleChange = (
        e: React.ChangeEvent<HTMLInputElement>
    ) => {
        const file = e.target.files?.[0];
         if (!file) return;

        setPreview(URL.createObjectURL(file));
        onChange?.(file);
    };

    return (
        <>
            <input
                ref={inputRef}
                type="file"
                accept="image/*"
                className="hidden"
                name="image"
                onChange={handleChange}
            />

            <div
                onClick={handleClick}
                className={cn(
                    "flex h-40 cursor-pointer items-center justify-center rounded-lg border-2 border-dashed transition hover:border-primary hover:bg-muted/40",
                    className
                )}
            >
                {preview ? (
                    <img
                        src={preview}
                        alt="Preview"
                        className="h-full w-full rounded-lg object-cover"
                    />
                ) : (
                    <div className="flex flex-col items-center gap-2 text-muted-foreground">
                        <ImagePlus className="h-8 w-8" />
                        <span className="text-sm">
                            Click to upload image
                        </span>
                        <span className="text-xs">
                            PNG, JPG, WEBP
                        </span>
                    </div>
                )}
            </div>
        </>
    );
}

export { ImageUpload }