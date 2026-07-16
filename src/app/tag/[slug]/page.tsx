import Image from "next/image";
import Link from "next/link";
import { Icon } from "@iconify/react";
import { Metadata } from "next";
import type { ReactNode } from "react";
import { getPaginationItems } from "@/lib/pagination";
import {
  createOpenGraphMetadata,
  organizationSchema,
  SITE_URL,
} from "@/lib/seo";
import {
  getCachedBlogCategorySummaries,
  getCachedPostsByTag,
} from "@/lib/public-cache";
import { prisma } from "@/lib/db";
import { shouldSkipDbDuringBuild } from "@/lib/build-env";

export const revalidate = 600;

interface PageProps {
  params: Promise<{ slug: string }>;
  searchParams: Promise<{ page?: string }>;
}

const BLOG_TAG_LIMIT = 12;

function getTagNameFromSlug(slug: string): string {
  return slug
    .split("-")
    .map((w) => w.charAt(0).toUpperCase() + w.slice(1))
    .join(" ");
}

function slugify(text: string): string {
  return text
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/^-|-$/g, "");
}

export async function generateMetadata({
  params,
}: PageProps): Promise<Metadata> {
  const { slug } = await params;

  if (!slug) {
    return {
      title: "Tag Blog - Lanyard Tangerang",
    };
  }

  const tagName = getTagNameFromSlug(slug);

  return {
    title: `#${tagName} - Blog Lanyard Tangerang`,
    description: `Kumpulan artikel Blog Lanyard Tangerang dengan tag ${tagName.toLowerCase()}. Tips cetak lanyard custom, panduan branding, dan inspirasi promosi.`,
    alternates: {
      canonical: `/tag/${slug}`,
    },
    ...createOpenGraphMetadata({
      title: `#${tagName} - Lanyard Tangerang`,
      description: `Jelajahi artikel dengan tag ${tagName}. Temukan insight lanyard custom & branding.`,
      path: `/tag/${slug}`,
      image: "/uploads/blog-hero-lanyardtangerang.webp",
    }),
  };
}

function getExcerpt(text: string | null | undefined, maxLength = 116): string {
  if (!text) return "";
  const clean = text
    .replace(/<[^>]*>/g, "")
    .replace(/&nbsp;/gi, " ")
    .replace(/\u00a0/g, " ")
    .replace(/\xa0/g, " ")
    .trim();

  if (clean.length <= maxLength) return clean;
  return `${clean.substring(0, maxLength).trim()}...`;
}

function BlogPostImage({
  eager,
  image,
  title,
}: {
  eager: boolean;
  image: string | null;
  title: string;
}) {
  if (!image) {
    return (
      <div className="flex h-full w-full items-center justify-center bg-public-soft text-public-amber">
        <Icon icon="lucide:image" className="h-12 w-12" />
      </div>
    );
  }

  if (image.startsWith("http")) {
    return (
      // eslint-disable-next-line @next/next/no-img-element
      <img
        src={image}
        alt={title}
        className="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
        fetchPriority={eager ? "high" : "auto"}
        loading={eager ? "eager" : "lazy"}
      />
    );
  }

  return (
    <Image
      src={image}
      alt={title}
      fill
      className="object-cover transition-transform duration-500 group-hover:scale-105"
      fetchPriority={eager ? "high" : "auto"}
      loading={eager ? "eager" : "lazy"}
      sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 25vw"
    />
  );
}

export default async function TagPostPage({ params, searchParams }: PageProps) {
  const { slug } = await params;
  const { page: pageParam } = await searchParams;
  const currentPage = Math.max(1, parseInt(pageParam || "1", 10) || 1);
  const tagName = getTagNameFromSlug(slug);

  const [{ posts, totalPosts }] = await Promise.all([
    getCachedPostsByTag(currentPage, BLOG_TAG_LIMIT, tagName, slug),
  ]);

  const totalPages = Math.ceil(totalPosts / BLOG_TAG_LIMIT);
  const paginationItems = getPaginationItems(currentPage, totalPages);

  const tagPageSchema = {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "CollectionPage",
        "@id": `${SITE_URL}/tag/${slug}/#collectionpage`,
        url: `${SITE_URL}/tag/${slug}`,
        name: `Tag: ${tagName} - Lanyard Tangerang`,
        description: `Kumpulan artikel dengan tag ${tagName}`,
        publisher: organizationSchema(),
      },
      {
        "@type": "BreadcrumbList",
        "@id": `${SITE_URL}/tag/${slug}/#breadcrumb`,
        itemListElement: [
          {
            "@type": "ListItem",
            position: 1,
            name: "Beranda",
            item: SITE_URL,
          },
          {
            "@type": "ListItem",
            position: 2,
            name: "Blog",
            item: `${SITE_URL}/blog`,
          },
          {
            "@type": "ListItem",
            position: 3,
            name: `Tag: ${tagName}`,
            item: `${SITE_URL}/tag/${slug}`,
          },
        ],
      },
    ],
  };

  return (
    <div className="flex min-h-screen flex-col bg-white">
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(tagPageSchema) }}
      />

      <section className="relative isolate overflow-hidden border-b border-public-border/70 bg-white px-4 py-10 sm:px-6 sm:py-12 lg:px-8">
        <div className="pointer-events-none absolute -right-16 top-0 h-72 w-72 rounded-full bg-public-soft" />
        <div className="pointer-events-none absolute right-10 top-16 hidden grid-cols-6 gap-2 sm:grid">
          {Array.from({ length: 24 }).map((_, index) => (
            <span key={index} className="h-1 w-1 rounded-full bg-public-amber/50" />
          ))}
        </div>

        <div className="relative mx-auto grid w-full max-w-7xl items-center gap-8 px-4 sm:px-6 md:grid-cols-[0.95fr_1.05fr] lg:px-8">
          <div className="max-w-xl">
            <nav className="flex items-center gap-2 text-xs font-bold uppercase tracking-normal text-gray-500 mb-3">
              <Link href="/blog" className="hover:text-public-amber-strong transition">Blog</Link>
              <span className="text-gray-300">/</span>
              <span className="text-gray-700">Tag</span>
            </nav>
            <p className="text-xs font-extrabold uppercase tracking-normal text-public-amber-strong">TAG</p>
            <h1 className="mt-3 text-4xl font-bold leading-[1.06] tracking-normal text-gray-950 sm:text-5xl lg:text-6xl">
              #{tagName}
            </h1>
            <div className="mt-5 h-1 w-16 rounded-full bg-public-amber" />
            <p className="mt-5 max-w-lg text-sm font-medium leading-7 text-gray-600">
              Menampilkan {totalPosts} artikel dengan topik <span className="font-bold text-gray-800">{tagName.toLowerCase()}</span>. Jelajahi panduan cetak lanyard custom, inspirasi branding, dan tips promosi.
            </p>

            <div className="mt-6 flex flex-wrap gap-2">
              <Link href="/blog" className="inline-flex items-center gap-1.5 px-4 py-2 rounded-full border border-public-border bg-white text-xs font-bold text-gray-700 hover:bg-public-soft transition">
                <Icon icon="lucide:arrow-left" className="w-4 h-4" /> Semua Artikel
              </Link>
            </div>
          </div>

          <div className="flex min-w-0 justify-center md:justify-end">
            <Image
              src="/uploads/blog-hero-lanyardtangerang.webp"
              alt={`Ilustrasi tag ${tagName} Lanyard Bogor`}
              width={1672}
              height={941}
              className="h-auto w-full max-w-[560px] object-contain"
              sizes="(max-width: 768px) 100vw, 50vw"
              loading="eager"
              fetchPriority="high"
            />
          </div>
        </div>
      </section>

      <main className="mx-auto w-full max-w-7xl flex-grow px-4 py-10 sm:px-6 lg:px-8">
        {posts.length === 0 ? (
          <div className="mx-auto mt-10 max-w-md rounded-2xl border border-public-border bg-white px-6 py-14 text-center shadow-sm">
            <div className="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-public-soft text-public-amber">
              <Icon icon="lucide:tag" className="h-7 w-7" />
            </div>
            <h2 className="mt-5 text-lg font-extrabold text-gray-950">Artikel tidak ditemukan</h2>
            <p className="mt-2 text-sm font-medium leading-6 text-gray-600">
              Belum ada artikel dengan tag <span className="font-bold text-gray-800">#{tagName}</span>. Coba cari tag lain.
            </p>
            <Link
              href="/blog"
              className="mt-5 inline-flex min-h-11 items-center justify-center rounded-lg bg-public-amber px-5 text-sm font-extrabold text-gray-950 transition hover:bg-public-amber-strong"
            >
              Lihat Semua Artikel
            </Link>
          </div>
        ) : (
          <div className="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            {posts.map((post, index) => {
              const formattedDate = new Date(post.createdAt).toLocaleDateString("id-ID", {
                day: "numeric",
                month: "short",
                year: "numeric",
                timeZone: "Asia/Jakarta",
              });
              const excerpt = post.metaDescription || getExcerpt(post.title, 110);

              // Parse tags
              // @ts-ignore
              const rawTags = (post as any).tags as string | null | undefined;
              const parsedTags = rawTags
                ? rawTags.split(",").map((t) => t.trim()).filter(Boolean).slice(0, 3)
                : [];

              return (
                <article
                  key={post.id}
                  className="group flex h-full flex-col overflow-hidden rounded-xl border border-public-border bg-white shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md"
                >
                  <Link href={`/blog/${post.slug}`} className="relative block aspect-[1.45/1] overflow-hidden bg-public-soft">
                    <BlogPostImage eager={index === 0 && currentPage === 1} image={post.featuredImage} title={post.title} />
                    {post.category ? (
                      <span className="absolute left-3 top-3 rounded-md bg-public-amber px-2.5 py-1 text-[10px] font-extrabold text-gray-950 shadow-sm">
                        {post.category.name}
                      </span>
                    ) : null}
                  </Link>

                  <div className="flex flex-1 flex-col p-4">
                    <p className="text-[11px] font-bold text-gray-500">{formattedDate}</p>
                    <Link href={`/blog/${post.slug}`} className="mt-2 block">
                      <h2 className="line-clamp-2 min-h-[2.65rem] text-base font-extrabold leading-snug text-gray-950 transition-colors group-hover:text-public-amber-strong">
                        {post.title}
                      </h2>
                    </Link>
                    <p className="mt-3 line-clamp-3 text-sm font-medium leading-6 text-gray-600">{excerpt}</p>

                    {parsedTags.length > 0 && (
                      <div className="mt-3 flex flex-wrap gap-1.5">
                        {parsedTags.map((t) => {
                          const tSlug = slugify(t);
                          return (
                            <Link
                              key={t}
                              href={`/tag/${tSlug}`}
                              className={`inline-flex rounded-full border px-2.5 py-1 text-[10px] font-bold transition ${
                                tSlug === slug
                                  ? "bg-public-amber border-public-amber text-gray-950"
                                  : "bg-white border-public-border text-gray-600 hover:bg-public-soft hover:border-public-amber/40 hover:text-public-amber-strong"
                              }`}
                            >
                              #{t}
                            </Link>
                          );
                        })}
                      </div>
                    )}

                    <div className="mt-auto pt-5">
                      <Link
                        href={`/blog/${post.slug}`}
                        className="inline-flex items-center gap-2 text-xs font-extrabold text-public-amber-strong transition hover:text-gray-950"
                      >
                        Baca Selengkapnya
                        <Icon icon="lucide:arrow-right" className="h-4 w-4" />
                      </Link>
                    </div>
                  </div>
                </article>
              );
            })}
          </div>
        )}

        {totalPages > 1 && (
          <div className="flex flex-wrap items-center justify-center gap-2 pt-12">
            <PaginationLink
              disabled={currentPage === 1}
              href={`/tag/${slug}?page=${currentPage - 1}`}
              label="Halaman sebelumnya"
            >
              <Icon icon="lucide:chevron-left" className="h-4 w-4" />
            </PaginationLink>

            {paginationItems.map((pageNumber) => {
              if (typeof pageNumber === "string") {
                return (
                  <span
                    key={pageNumber}
                    className="inline-flex h-9 w-9 items-center justify-center text-xs font-bold text-gray-400"
                  >
                    ...
                  </span>
                );
              }

              const isCurrent = pageNumber === currentPage;
              return (
                <Link
                  key={pageNumber}
                  href={`/tag/${slug}?page=${pageNumber}`}
                  className={`inline-flex h-9 w-9 items-center justify-center rounded-lg border text-xs font-extrabold transition ${
                    isCurrent
                      ? "border-public-amber bg-public-amber text-gray-950"
                      : "border-public-border bg-white text-gray-700 hover:border-public-amber hover:text-public-amber-strong"
                  }`}
                  aria-current={isCurrent ? "page" : undefined}
                >
                  {pageNumber}
                </Link>
              );
            })}

            <PaginationLink
              disabled={currentPage === totalPages}
              href={`/tag/${slug}?page=${currentPage + 1}`}
              label="Halaman berikutnya"
            >
              <Icon icon="lucide:chevron-right" className="h-4 w-4" />
            </PaginationLink>
          </div>
        )}
      </main>
    </div>
  );
}

function PaginationLink({
  children,
  disabled,
  href,
  label,
}: {
  children: ReactNode;
  disabled: boolean;
  href: string;
  label: string;
}) {
  if (disabled) {
    return (
      <span
        className="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-public-border bg-white text-gray-300"
        aria-disabled="true"
      >
        {children}
      </span>
    );
  }

  return (
    <Link
      href={href}
      className="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-public-border bg-white text-gray-700 transition hover:border-public-amber hover:text-public-amber-strong"
      aria-label={label}
    >
      {children}
    </Link>
  );
}
