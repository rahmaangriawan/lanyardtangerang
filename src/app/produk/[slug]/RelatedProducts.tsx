import Image from "next/image";
import Link from "next/link";
import { UnifiedProduct } from "@/lib/products-service";

interface RelatedProductsProps {
  currentProduct: UnifiedProduct;
  allProducts: UnifiedProduct[];
}

export default function RelatedProducts({ currentProduct, allProducts }: RelatedProductsProps) {
  // Cari produk lain dengan kategori yang sama
  let related = allProducts.filter(
    (p) => p.sku !== currentProduct.sku && p.categoryId === currentProduct.categoryId
  );

  // Jika produk dengan kategori sama kurang dari 4, tambahkan produk random/lain
  if (related.length < 4) {
    const fallbackProducts = allProducts.filter(
      (p) => p.sku !== currentProduct.sku && p.categoryId !== currentProduct.categoryId
    );
    related = [...related, ...fallbackProducts].slice(0, 4);
  } else {
    related = related.slice(0, 4);
  }

  if (related.length === 0) return null;

  return (
    <section className="mt-12 pt-10 border-t border-public-border/70">
      <h2 className="text-xl sm:text-2xl font-black text-[#373f50] mb-6">
        Produk Terkait
      </h2>

      {/* Swipeable Container on Mobile, Grid on Desktop */}
      <div 
        className="flex overflow-x-auto pb-4 gap-4 snap-x snap-mandatory scrollbar-none sm:grid sm:grid-cols-4 sm:overflow-visible sm:pb-0"
        style={{ scrollbarWidth: 'none', msOverflowStyle: 'none' }}
      >
        {related.map((product) => (
          <Link
            key={product.sku}
            href={`/produk/${product.slug}`}
            className="flex-shrink-0 w-[70vw] sm:w-auto snap-start bg-white border border-public-border/70 rounded-2xl overflow-hidden hover:shadow-md transition-shadow duration-300 group"
          >
            {/* Gambar */}
            <div className="relative aspect-[16/10] bg-public-soft overflow-hidden">
              <Image
                src={product.featuredImage || "/uploads/aset-lanyard-4-1782114161098.webp"}
                alt={product.name}
                fill
                className="object-cover transition-transform duration-300 group-hover:scale-105"
                sizes="(max-width: 640px) 70vw, 25vw"
                quality={50}
              />
            </div>

            {/* Konten Card */}
            <div className="p-4 space-y-1">
              <h3 className="text-sm font-bold text-gray-800 line-clamp-2 min-h-[2.5rem] group-hover:text-public-amber-strong transition-colors leading-snug">
                {product.name}
              </h3>
              <p className="text-xs font-black text-public-amber-strong">
                Mulai {product.basePrice}
              </p>
            </div>
          </Link>
        ))}
      </div>
    </section>
  );
}
