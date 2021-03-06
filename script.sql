USE [master]
GO
/****** Object:  Database [QuanLyTaiSanCong]    Script Date: 6/29/2021 5:51:09 PM ******/
CREATE DATABASE [QuanLyTaiSanCong]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'QuanLyTaiSanCong', FILENAME = N'D:\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\QuanLyTaiSanCong.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'QuanLyTaiSanCong_log', FILENAME = N'D:\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\QuanLyTaiSanCong_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [QuanLyTaiSanCong] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [QuanLyTaiSanCong].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [QuanLyTaiSanCong] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET ARITHABORT OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET  ENABLE_BROKER 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET RECOVERY FULL 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET  MULTI_USER 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [QuanLyTaiSanCong] SET DB_CHAINING OFF 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [QuanLyTaiSanCong] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'QuanLyTaiSanCong', N'ON'
GO
ALTER DATABASE [QuanLyTaiSanCong] SET QUERY_STORE = OFF
GO
USE [QuanLyTaiSanCong]
GO
/****** Object:  Table [dbo].[chitiethopdong]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chitiethopdong](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[ma_hopdong] [nvarchar](50) NULL,
	[ma_ts] [nvarchar](50) NULL,
	[soluong] [int] NULL,
	[vat] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[chitietphieu]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chitietphieu](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[ma_bangiao] [nvarchar](50) NULL,
	[ma_kiemke] [nvarchar](50) NULL,
	[ma_thanhly] [nvarchar](50) NULL,
	[ma_ts] [nvarchar](50) NULL,
	[soluong] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[chitiettaisan]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chitiettaisan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[ma_chitiet] [nvarchar](50) NULL,
	[ma_ts] [nvarchar](50) NULL,
	[so_serial] [int] NULL,
	[ma_nv] [nvarchar](50) NULL,
	[trangthai] [int] NULL,
	[ten_chitiet] [nvarchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[chucvu]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[chucvu](
	[ma_chucvu] [nvarchar](50) NOT NULL,
	[ten_chucvu] [nvarchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_chucvu] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[documents]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[documents](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[tieude] [nvarchar](255) NOT NULL,
	[noidung] [nvarchar](255) NOT NULL,
	[name_file] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[failed_jobs]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[hopdong]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[hopdong](
	[ma_hopdong] [nvarchar](50) NOT NULL,
	[ma_ncc] [nvarchar](50) NULL,
	[ngay_ky] [datetime] NULL,
	[ngay_thanhly] [datetime] NULL,
	[trangthai] [int] NULL,
	[tongtien] [float] NULL,
	[dathanhtoan] [float] NULL,
	[ghichu] [nvarchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_hopdong] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[loai]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[loai](
	[id_loai] [int] IDENTITY(1,1) NOT NULL,
	[ten_loai] [nvarchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[id_loai] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[loaitaisancodinh]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[loaitaisancodinh](
	[ma_loai] [nvarchar](50) NOT NULL,
	[ten_loai] [nvarchar](200) NULL,
	[id_loai] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_loai] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[nhacungcap]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[nhacungcap](
	[ma_ncc] [nvarchar](50) NOT NULL,
	[ten_ncc] [nvarchar](200) NULL,
	[sdt] [int] NULL,
	[email] [nvarchar](100) NULL,
	[diachi] [nvarchar](max) NULL,
	[created] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_ncc] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[nhanvien]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[nhanvien](
	[ma_nv] [nvarchar](50) NOT NULL,
	[ten_nv] [nvarchar](200) NULL,
	[sdt] [int] NULL,
	[email] [nvarchar](100) NULL,
	[diachi] [nvarchar](max) NULL,
	[ma_phong] [nvarchar](50) NULL,
	[created] [datetime] NULL,
	[ma_chucvu] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_nv] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_resets]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_resets](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[phieubangiao]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[phieubangiao](
	[ma_bangiao] [nvarchar](50) NOT NULL,
	[ma_nv] [nvarchar](50) NULL,
	[nguoi_giao] [nvarchar](100) NULL,
	[nguoi_nhan] [nvarchar](100) NULL,
	[ngay_nhan] [datetime] NULL,
	[ma_phong] [nvarchar](50) NULL,
	[ghichu] [nvarchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_bangiao] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[phieukiemke]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[phieukiemke](
	[ma_kiemke] [nvarchar](50) NOT NULL,
	[ma_nv] [nvarchar](50) NULL,
	[dot_kiemke] [nvarchar](100) NULL,
	[ngay_kiemke] [datetime] NULL,
	[ma_phong] [nvarchar](50) NULL,
	[ghichu] [nvarchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_kiemke] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[phieuthanhly]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[phieuthanhly](
	[ma_thanhly] [nvarchar](50) NOT NULL,
	[ma_nv] [nvarchar](50) NULL,
	[ngay_thanhly] [datetime] NULL,
	[ma_phong] [nvarchar](50) NULL,
	[ghichu] [nvarchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_thanhly] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[phongban]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[phongban](
	[ma_phong] [nvarchar](50) NOT NULL,
	[ten_phong] [nvarchar](200) NULL,
	[mota] [nvarchar](max) NULL,
	[created] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_phong] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[taisan]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[taisan](
	[ma_ts] [nvarchar](50) NOT NULL,
	[ten_ts] [nvarchar](200) NULL,
	[ma_loai] [nvarchar](50) NULL,
	[nguyengia] [int] NULL,
	[ma_ncc] [nvarchar](50) NULL,
	[ngay_mua] [datetime] NULL,
	[nuoc_sx] [nvarchar](max) NULL,
	[nam_sx] [nvarchar](max) NULL,
	[ngay_ghi_tang] [datetime] NULL,
	[ngay_sd] [datetime] NULL,
	[ma_phong] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_ts] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[temp]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[temp](
	[ma_ts] [nvarchar](50) NOT NULL,
	[sl] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tieuhaotaisan]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tieuhaotaisan](
	[ma_tieuhao] [nvarchar](50) NOT NULL,
	[muc_tieuhao] [float] NOT NULL,
	[thoi_gian_sd] [int] NOT NULL,
	[ngay_bat_dau] [datetime] NULL,
	[ma_loai] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[ma_tieuhao] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 6/29/2021 5:51:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[password] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[chitiettaisan] ON 

INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (12, N'CTS000001', N'TS000001', NULL, NULL, 0, N'Máy vi tính0')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (13, N'CTS000002', N'TS000001', NULL, NULL, 0, N'Máy vi tính1')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (14, N'CTS000003', N'TS000001', NULL, NULL, 0, N'Máy vi tính2')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (15, N'CTS000004', N'TS000002', NULL, NULL, 0, N'Máy vi tính0')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (16, N'CTS000005', N'TS000002', NULL, NULL, 0, N'Máy vi tính1')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (17, N'CTS000006', N'TS000003', NULL, NULL, 0, N'Máy vi tính (2021)0')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (18, N'CTS000007', N'TS000003', NULL, NULL, 0, N'Máy vi tính (2021)1')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (19, N'CTS000008', N'TS000003', NULL, NULL, 0, N'Máy vi tính (2021)2')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (20, N'CTS000009', N'TS000004', NULL, NULL, 0, N'Máy in 0')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (21, N'CTS000010', N'TS000004', NULL, NULL, 0, N'Máy in 1')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (22, N'CTS000011', N'TS000004', NULL, NULL, 0, N'Máy in 2')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (24, N'CTS000012', N'TS000003', 123456789, N'NV000001', NULL, N'Máy vi tính abc')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (25, N'CTS000013', N'TS000001', 123654, N'NV000002', 1, N'Máy vi tính 03')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (26, N'CTS000014', N'TS000002', 123, N'NV000001', 0, N'Máy vi tính 03')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (28, N'CTS000015', N'TS000006', 0, NULL, 0, N'Máy fax (2021) 0')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (29, N'CTS000016', N'TS000006', 0, NULL, 0, N'Máy fax (2021) 1')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (30, N'CTS000017', N'TS000007', 0, NULL, 0, N'Máy in A3 0')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (31, N'CTS000018', N'TS000008', 0, NULL, 0, N'Két sắt (1)')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (32, N'CTS000019', N'TS000009', 0, NULL, 0, N'Máy tính xách tay Dell (1)')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (33, N'CTS000020', N'TS000009', 0, NULL, 0, N'Máy tính xách tay Dell (2)')
INSERT [dbo].[chitiettaisan] ([id], [ma_chitiet], [ma_ts], [so_serial], [ma_nv], [trangthai], [ten_chitiet]) VALUES (34, N'CTS000021', N'TS000001', 123455, N'NV000001', 0, N'Máy vi tính 04')
SET IDENTITY_INSERT [dbo].[chitiettaisan] OFF
GO
INSERT [dbo].[chucvu] ([ma_chucvu], [ten_chucvu]) VALUES (N'CV000001', N'Kế toán                                                                                                                                                                                                 ')
INSERT [dbo].[chucvu] ([ma_chucvu], [ten_chucvu]) VALUES (N'CV000002', N'Trưởng phòng                                                                                                                                                                                            ')
GO
SET IDENTITY_INSERT [dbo].[documents] ON 

INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (1, N'Mẫu số 01/TSC-BBGN', N'Biên bản bàn giao, tiếp nhận tài sản công', N'M_u s_ 01 Biên b_n bàn giao, ti_p nh_n tài s_n công (1).docx', CAST(N'2021-06-20T10:52:20.483' AS DateTime), CAST(N'2021-06-20T10:52:20.483' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (2, N'Mẫu số 02/TSC-ĐA', N'Đề án sử dụng tài sản công tại đơn vị sự nghiệp công lập vào mục đích kinh doanh/cho thuê/liên doanh, liên kết', N'Mẫu số 02 Đề án sử dụng tài sản công tại đơn vị sự nghiệp công lập vào mục đích kinh doanh.docx', CAST(N'2021-06-20T11:29:45.097' AS DateTime), CAST(N'2021-06-20T11:29:45.097' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (3, N'Mẫu số 03/TSC-MSTT', N'Bảng tổng hợp nhu cầu mua sắm tập trung', N'M_u s_ 03 B_ng t_ng h_p nhu c_u mua s_m t_p trung.docx', CAST(N'2021-06-20T12:26:16.663' AS DateTime), CAST(N'2021-06-20T12:26:16.663' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (4, N'Mẫu số 04/TSC-MSTT', N'Thỏa thuận khung mua sắm tập trung', N'M_u s_ 04Th_a thu_n khung mua s_m t_p trung.docx', CAST(N'2021-06-20T12:26:35.477' AS DateTime), CAST(N'2021-06-20T12:26:35.477' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (5, N'Mẫu số 05b/TSC-MSTT', N'Hợp đồng mua sắm tài sản', N'M_u s_ 05bH_p __ng mua s_m tài s_n.docx', CAST(N'2021-06-20T12:27:25.253' AS DateTime), CAST(N'2021-06-20T12:27:25.253' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (6, N'Mẫu số 06/TSC-MSTT', N'Biên bản nghiệm thu, bàn giao, tiếp nhận tài sản', N'M_u s_ 06Biên b_n nghi_m thu, bàn giao, ti_p nh_n tài s_n.docx', CAST(N'2021-06-20T12:28:32.140' AS DateTime), CAST(N'2021-06-20T12:28:32.140' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (7, N'Mẫu số 07/TSC-TSDA', N'Danh mục tài sản đề nghị xử lý', N'Mẫu số 07Danh mục tài sản đề nghị xử lý.docx', CAST(N'2021-06-20T12:28:58.350' AS DateTime), CAST(N'2021-06-20T12:28:58.350' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (8, N'Mẫu số 08/TSC-HĐ', N'Hóa đơn bán tài sản công', N'M_u s_ 08Hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:29:33.067' AS DateTime), CAST(N'2021-06-20T12:29:33.067' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (9, N'Mẫu số 09/TSC-HĐ', N'Báo cáo nhập, xuất, tồn hóa đơn bán tài sản công', N'M_u s_ 09Báo cáo nh_p, xu_t, t_n hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:29:51.747' AS DateTime), CAST(N'2021-06-20T12:29:51.747' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (10, N'Mẫu số 10/TSC-HĐ', N'Báo cáo tình hình quản lý, sử dụng hóa đơn bán tài sản công', N'M_u s_ 10Báo cáo t́nh h́nh qu_n lư, s_ d_ng hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:30:16.127' AS DateTime), CAST(N'2021-06-20T12:30:16.127' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (11, N'Mẫu số 11/TSC-HĐ', N'Sổ theo dõi việc bán hóa đơn bán tài sản công', N'M_u s_ 11S_ theo dơi vi_c bán hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:30:33.140' AS DateTime), CAST(N'2021-06-20T12:30:33.140' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (12, N'Mẫu số 12/TSC-HĐ', N'Sổ theo dõi việc bán hóa đơn bán tài sản công', N'M_u s_ 12S_ theo dơi vi_c bán hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:30:51.997' AS DateTime), CAST(N'2021-06-20T12:30:51.997' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (13, N'Mẫu số 13/TSC-HĐ', N'Sổ theo dõi hóa đơn bị mất', N'M_u s_ 13S_ theo dơi hóa __n b_ m_t.docx', CAST(N'2021-06-20T12:31:09.370' AS DateTime), CAST(N'2021-06-20T12:31:09.370' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (14, N'Mẫu số 14/TSC-HĐ', N'Thông báo về việc mất hóa đơn bán tài sản công', N'M_u s_ 14Thông báo v_ vi_c m_t hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:31:30.423' AS DateTime), CAST(N'2021-06-20T12:31:30.423' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (15, N'Mẫu số 15/TSC-HĐ', N'Báo cáo thanh, quyết toán hóa đơn bán tài sản công', N'M_u s_ 15Báo cáo thanh, quy_t toán hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:31:51.343' AS DateTime), CAST(N'2021-06-20T12:31:51.343' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (16, N'Mẫu số 16/TSC-HĐ', N'Báo cáo về việc mất hóa đơn bán tài sản công', N'M_u s_ 16Báo cáo v_ vi_c m_t hóa __n bán tài s_n công.docx', CAST(N'2021-06-20T12:32:04.187' AS DateTime), CAST(N'2021-06-20T12:32:04.187' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (17, N'Mẫu số 17a/TSC-QSDĐ', N'Văn bản xác định giá trị quyền sử dụng đất để tính vào giá trị tài sản của cơ quan, tổ chức, đơn vị', N'Mẫu số 17aVăn bản xác định giá trị quyền sử dụng đất để tính vào giá trị tài sản của cơ quan, tổ chức, đơn vị.docx', CAST(N'2021-06-20T12:32:29.037' AS DateTime), CAST(N'2021-06-20T12:32:29.037' AS DateTime))
INSERT [dbo].[documents] ([id], [tieude], [noidung], [name_file], [created_at], [updated_at]) VALUES (18, N'Mẫu số 17b/TSC-QSDĐ', N'Văn bản điều chỉnh giá trị quyền sử dụng đất để tính vào giá trị tài sản của cơ quan, tổ chức, đơn vị', N'Mẫu số 17bVăn bản điều chỉnh giá trị quyền sử dụng đất để tính vào giá trị tài sản của cơ quan, tổ chức, đơn vị.docx', CAST(N'2021-06-23T07:53:56.123' AS DateTime), CAST(N'2021-06-23T07:53:56.123' AS DateTime))
SET IDENTITY_INSERT [dbo].[documents] OFF
GO
SET IDENTITY_INSERT [dbo].[loai] ON 

INSERT [dbo].[loai] ([id_loai], [ten_loai]) VALUES (1, N'Máy móc, thiết bị văn phòng phổ biến')
INSERT [dbo].[loai] ([id_loai], [ten_loai]) VALUES (2, N'Máy móc, thiết bị phục vụ hoạt động chung của cơ quan tổ chức đơn vị')
INSERT [dbo].[loai] ([id_loai], [ten_loai]) VALUES (3, N'Máy móc, thiết bị chuyên dùng')
SET IDENTITY_INSERT [dbo].[loai] OFF
GO
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000001', N'Máy vi tính để bàn', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000002', N'Máy vi tính xách tay', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000003', N'Máy in', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000004', N'Máy chiếu', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000005', N'Thiết bị lọc nước', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000006', N'Máy fax', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000007', N'Túi đựng tài liệu', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000008', N'Máy scan', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000009', N'Máy hủy tài liệu', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000010', N'Máy photocopy', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000011', N'Bộ bàn ghế ngồi làm việc trang bị cho các chức danh', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000012', N'Bộ bàn ghế họp', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000013', N'Bộ bàn ghế tiếp khách', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000014', N'Máy điều hòa không khí', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000015', N'Quạt', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000016', N'Máy sưởi', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000017', N'Máy móc, thiết bị văn phòng phổ biến khác', 1)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000018', N'Máy hút ẩm, hút bụi', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000019', N'Ti vi, đầu Video, các loại đầu thu phát tín hiệu kỹ thuật số khác', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000020', N'Máy ghi âm', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000021', N'Máy ảnh', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000022', N'Thiết bị âm thanh', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000023', N'Tổng đài điện thoại, máy bộ đàm', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000024', N'Thiết bị thông tin liên lạc khác', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000025', N'Tủ lạnh, máy làm mát', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000026', N'Máy giặt', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000027', N'Thiết bị mạng, truyền thông', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000028', N'Thiết bị điện văn phòng', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000029', N'Thiết bị điện tử phục vụ quản lý, lưu trữ dữ liệu', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000030', N'Thiết bị truyền dẫn', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000031', N'Camera giám sát', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000032', N'Thang máy', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000033', N'Máy bơm nước', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000034', N'Két sắt', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000035', N'Bàn ghế hội trường', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000036', N'Tủ, giá kệ đựng tài liệu hoặc trưng bày hiện vật', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000037', N'Máy móc, thiết bị phục vụ hoạt động chung khác', 2)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000038', N'Máy móc, thiết bị chuyên dùng phục vụ hoạt động cung cấp dịch vụ công thuộc lĩnh vực y tế, giáo dục và đào tạo', 3)
INSERT [dbo].[loaitaisancodinh] ([ma_loai], [ten_loai], [id_loai]) VALUES (N'LTS000039', N'Máy móc, thiết bị khác phục vụ nhiệm vụ đặc thù của cơ quan, tổ chức, đơn vị', 3)
GO
SET IDENTITY_INSERT [dbo].[migrations] ON 

INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (1, N'2014_10_12_000000_create_users_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (2, N'2014_10_12_100000_create_password_resets_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (3, N'2019_08_19_000000_create_failed_jobs_table', 1)
INSERT [dbo].[migrations] ([id], [migration], [batch]) VALUES (4, N'2021_06_19_083216_create_documents_table', 1)
SET IDENTITY_INSERT [dbo].[migrations] OFF
GO
INSERT [dbo].[nhacungcap] ([ma_ncc], [ten_ncc], [sdt], [email], [diachi], [created]) VALUES (N'NCC000001', N'Công ty abc                                                                                                                                                                                             ', 1141896285, N'abc@gmail.com                                                                                       ', N'djssjskkc', CAST(N'2021-06-25T05:10:48.000' AS DateTime))
INSERT [dbo].[nhacungcap] ([ma_ncc], [ten_ncc], [sdt], [email], [diachi], [created]) VALUES (N'NCC000002', N'Công ty XYZ                                                                                                                                                                                             ', 2120555555, N'xyz@gmail.com                                                                                       ', N'Cần Thơ', CAST(N'2021-06-25T05:21:09.000' AS DateTime))
GO
INSERT [dbo].[nhanvien] ([ma_nv], [ten_nv], [sdt], [email], [diachi], [ma_phong], [created], [ma_chucvu]) VALUES (N'NV000001', N'Trần Văn A                                                                                                                                                                                              ', 211554855, N'a@gmail.com                                                                                         ', N'sjsjsjjsjs', N'PB000001', CAST(N'2021-06-25T07:24:41.000' AS DateTime), N'CV000001')
INSERT [dbo].[nhanvien] ([ma_nv], [ten_nv], [sdt], [email], [diachi], [ma_phong], [created], [ma_chucvu]) VALUES (N'NV000002', N'Nguyễn Văn Tèo                                                                                                                                                                                          ', 2125457863, N'teo@gmail.com                                                                                       ', N'Cần Thơ', N'PB000002', CAST(N'2021-06-25T07:38:33.000' AS DateTime), N'CV000002')
GO
INSERT [dbo].[phongban] ([ma_phong], [ten_phong], [mota], [created]) VALUES (N'PB000001', N'Phòng Đào tạo                                                                                                                                                                                           ', NULL, CAST(N'2021-06-24T16:53:10.000' AS DateTime))
INSERT [dbo].[phongban] ([ma_phong], [ten_phong], [mota], [created]) VALUES (N'PB000002', N'Phòng Hành chính - Tổng hợp                                                                                                                                                                             ', NULL, CAST(N'2021-06-25T04:40:50.000' AS DateTime))
INSERT [dbo].[phongban] ([ma_phong], [ten_phong], [mota], [created]) VALUES (N'PB000003', N'Phòng Quản trị - Ứng dụng', NULL, CAST(N'2021-06-28T07:11:06.000' AS DateTime))
GO
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000001', N'Máy vi tính', N'LTS000001', 15000000, N'NCC000001', CAST(N'2021-06-26T00:00:00.000' AS DateTime), N'Việt Nam', N'2021', CAST(N'2021-06-26T15:15:06.193' AS DateTime), CAST(N'2021-06-26T00:00:00.000' AS DateTime), N'PB000001')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000002', N'Máy vi tính', N'LTS000001', 19000000, N'NCC000001', CAST(N'2021-06-26T00:00:00.000' AS DateTime), N'Thái Lan', N'2021', CAST(N'2021-06-26T15:21:04.510' AS DateTime), CAST(N'2021-06-26T00:00:00.000' AS DateTime), N'PB000002')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000003', N'Máy vi tính (2021)', N'LTS000002', 19500000, N'NCC000001', CAST(N'2021-06-27T00:00:00.000' AS DateTime), N'Việt Nam', N'2021', CAST(N'2021-06-27T06:57:03.280' AS DateTime), CAST(N'2021-06-27T00:00:00.000' AS DateTime), N'PB000001')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000004', N'Máy in', N'LTS000003', 19000000, N'NCC000001', CAST(N'2021-06-27T00:00:00.000' AS DateTime), N'Thái Lan', N'2021', CAST(N'2021-06-27T08:17:59.510' AS DateTime), CAST(N'2021-06-27T00:00:00.000' AS DateTime), N'PB000002')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000005', N'Máy fax samsung', N'LTS000006', 21000000, N'NCC000002', CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'Việt Nam', N'2021', CAST(N'2021-06-28T06:29:35.323' AS DateTime), CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'PB000001')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000006', N'Máy fax (2021)', N'LTS000006', 21000000, N'NCC000001', CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'Thái Lan', N'2021', CAST(N'2021-06-28T06:32:12.877' AS DateTime), CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'PB000002')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000007', N'Máy in A3', N'LTS000003', 17800000, N'NCC000001', CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'Trung Quốc', N'2021', CAST(N'2021-06-28T07:18:28.263' AS DateTime), CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'PB000003')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000008', N'Két sắt', N'LTS000034', 30000000, N'NCC000001', CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'Việt Nam', N'2021', CAST(N'2021-06-28T07:25:48.940' AS DateTime), CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'PB000002')
INSERT [dbo].[taisan] ([ma_ts], [ten_ts], [ma_loai], [nguyengia], [ma_ncc], [ngay_mua], [nuoc_sx], [nam_sx], [ngay_ghi_tang], [ngay_sd], [ma_phong]) VALUES (N'TS000009', N'Máy tính xách tay Dell', N'LTS000002', 20500000, N'NCC000001', CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'Việt Nam', N'2020', CAST(N'2021-06-28T07:33:25.343' AS DateTime), CAST(N'2021-06-28T00:00:00.000' AS DateTime), N'PB000003')
GO
INSERT [dbo].[temp] ([ma_ts], [sl]) VALUES (N'TS000001', 3)
INSERT [dbo].[temp] ([ma_ts], [sl]) VALUES (N'TS000002', 2)
INSERT [dbo].[temp] ([ma_ts], [sl]) VALUES (N'TS000003', 3)
GO
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000001', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000001')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000002', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000002')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000003', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000003')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000004', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000004')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000005', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000005')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000006', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000006')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000007', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000007')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000008', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000008')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000009', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000009')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000010', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000010')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000011', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000011')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000012', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000012')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000013', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000013')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000014', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000014')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000015', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000015')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000016', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000016')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000017', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000017')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000018', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000018')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000019', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000019')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000020', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000020')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000021', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000021')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000022', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000022')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000023', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000023')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000024', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000024')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000025', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000025')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000026', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000026')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000027', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000027')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000028', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000028')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000029', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000029')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000030', 20, 5, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000030')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000031', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000031')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000032', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000032')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000033', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000033')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000034', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000034')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000035', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000035')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000036', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000036')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000037', 12.5, 8, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000037')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000038', 10, 10, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000038')
INSERT [dbo].[tieuhaotaisan] ([ma_tieuhao], [muc_tieuhao], [thoi_gian_sd], [ngay_bat_dau], [ma_loai]) VALUES (N'TH000039', 10, 10, CAST(N'1900-01-01T00:00:00.000' AS DateTime), N'LTS000039')
GO
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([id], [name], [email], [password], [created_at], [updated_at]) VALUES (1, N'admin', N'admin@gmail.com', N'$2y$10$b0ytgG1L6jsut1koiPApSOI9aRZ/w50MLWPT3qjZp34DHNN2imvTW', CAST(N'2021-06-21T14:11:30.157' AS DateTime), CAST(N'2021-06-21T14:11:30.157' AS DateTime))
INSERT [dbo].[users] ([id], [name], [email], [password], [created_at], [updated_at]) VALUES (2, N'admin1', N'admin1@gmail.com', N'$2y$10$ULGGIyA82maJZ4w.ZQ6PmOdZzZDM6IlwyCJVgQjsns.r1cXrXFkzu', CAST(N'2021-06-21T15:48:57.580' AS DateTime), CAST(N'2021-06-21T15:48:57.580' AS DateTime))
SET IDENTITY_INSERT [dbo].[users] OFF
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [password_resets_email_index]    Script Date: 6/29/2021 5:51:09 PM ******/
CREATE NONCLUSTERED INDEX [password_resets_email_index] ON [dbo].[password_resets]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_email_unique]    Script Date: 6/29/2021 5:51:09 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique] ON [dbo].[users]
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[chitiettaisan] ADD  DEFAULT ((0)) FOR [trangthai]
GO
ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO
ALTER TABLE [dbo].[chitiethopdong]  WITH CHECK ADD  CONSTRAINT [FK_DH_CTHD] FOREIGN KEY([ma_hopdong])
REFERENCES [dbo].[hopdong] ([ma_hopdong])
GO
ALTER TABLE [dbo].[chitiethopdong] CHECK CONSTRAINT [FK_DH_CTHD]
GO
ALTER TABLE [dbo].[chitiethopdong]  WITH CHECK ADD  CONSTRAINT [FK_DH_TS] FOREIGN KEY([ma_ts])
REFERENCES [dbo].[taisan] ([ma_ts])
GO
ALTER TABLE [dbo].[chitiethopdong] CHECK CONSTRAINT [FK_DH_TS]
GO
ALTER TABLE [dbo].[chitietphieu]  WITH CHECK ADD  CONSTRAINT [FK_CTP_PBG] FOREIGN KEY([ma_bangiao])
REFERENCES [dbo].[phieubangiao] ([ma_bangiao])
GO
ALTER TABLE [dbo].[chitietphieu] CHECK CONSTRAINT [FK_CTP_PBG]
GO
ALTER TABLE [dbo].[chitietphieu]  WITH CHECK ADD  CONSTRAINT [FK_CTP_PKK] FOREIGN KEY([ma_kiemke])
REFERENCES [dbo].[phieukiemke] ([ma_kiemke])
GO
ALTER TABLE [dbo].[chitietphieu] CHECK CONSTRAINT [FK_CTP_PKK]
GO
ALTER TABLE [dbo].[chitietphieu]  WITH CHECK ADD  CONSTRAINT [FK_CTP_PTL] FOREIGN KEY([ma_thanhly])
REFERENCES [dbo].[phieuthanhly] ([ma_thanhly])
GO
ALTER TABLE [dbo].[chitietphieu] CHECK CONSTRAINT [FK_CTP_PTL]
GO
ALTER TABLE [dbo].[chitietphieu]  WITH CHECK ADD  CONSTRAINT [FK_PBG_TS] FOREIGN KEY([ma_ts])
REFERENCES [dbo].[taisan] ([ma_ts])
GO
ALTER TABLE [dbo].[chitietphieu] CHECK CONSTRAINT [FK_PBG_TS]
GO
ALTER TABLE [dbo].[chitiettaisan]  WITH CHECK ADD  CONSTRAINT [FK_CT_TS] FOREIGN KEY([ma_ts])
REFERENCES [dbo].[taisan] ([ma_ts])
GO
ALTER TABLE [dbo].[chitiettaisan] CHECK CONSTRAINT [FK_CT_TS]
GO
ALTER TABLE [dbo].[chitiettaisan]  WITH CHECK ADD  CONSTRAINT [FK_TS_NV1] FOREIGN KEY([ma_nv])
REFERENCES [dbo].[nhanvien] ([ma_nv])
GO
ALTER TABLE [dbo].[chitiettaisan] CHECK CONSTRAINT [FK_TS_NV1]
GO
ALTER TABLE [dbo].[hopdong]  WITH CHECK ADD  CONSTRAINT [FK_HD_NCC] FOREIGN KEY([ma_ncc])
REFERENCES [dbo].[nhacungcap] ([ma_ncc])
GO
ALTER TABLE [dbo].[hopdong] CHECK CONSTRAINT [FK_HD_NCC]
GO
ALTER TABLE [dbo].[loaitaisancodinh]  WITH CHECK ADD FOREIGN KEY([id_loai])
REFERENCES [dbo].[loai] ([id_loai])
GO
ALTER TABLE [dbo].[nhanvien]  WITH CHECK ADD  CONSTRAINT [FK_NV_CV] FOREIGN KEY([ma_chucvu])
REFERENCES [dbo].[chucvu] ([ma_chucvu])
GO
ALTER TABLE [dbo].[nhanvien] CHECK CONSTRAINT [FK_NV_CV]
GO
ALTER TABLE [dbo].[nhanvien]  WITH CHECK ADD  CONSTRAINT [FK_NV_PHONG] FOREIGN KEY([ma_phong])
REFERENCES [dbo].[phongban] ([ma_phong])
GO
ALTER TABLE [dbo].[nhanvien] CHECK CONSTRAINT [FK_NV_PHONG]
GO
ALTER TABLE [dbo].[phieubangiao]  WITH CHECK ADD  CONSTRAINT [FK_PBG_PB] FOREIGN KEY([ma_phong])
REFERENCES [dbo].[phongban] ([ma_phong])
GO
ALTER TABLE [dbo].[phieubangiao] CHECK CONSTRAINT [FK_PBG_PB]
GO
ALTER TABLE [dbo].[phieukiemke]  WITH CHECK ADD  CONSTRAINT [FK_PKK_NV] FOREIGN KEY([ma_nv])
REFERENCES [dbo].[nhanvien] ([ma_nv])
GO
ALTER TABLE [dbo].[phieukiemke] CHECK CONSTRAINT [FK_PKK_NV]
GO
ALTER TABLE [dbo].[phieukiemke]  WITH CHECK ADD  CONSTRAINT [FK_PKK_PB] FOREIGN KEY([ma_phong])
REFERENCES [dbo].[phongban] ([ma_phong])
GO
ALTER TABLE [dbo].[phieukiemke] CHECK CONSTRAINT [FK_PKK_PB]
GO
ALTER TABLE [dbo].[phieuthanhly]  WITH CHECK ADD  CONSTRAINT [FK_PTL_NV] FOREIGN KEY([ma_nv])
REFERENCES [dbo].[nhanvien] ([ma_nv])
GO
ALTER TABLE [dbo].[phieuthanhly] CHECK CONSTRAINT [FK_PTL_NV]
GO
ALTER TABLE [dbo].[phieuthanhly]  WITH CHECK ADD  CONSTRAINT [FK_PTL_PB] FOREIGN KEY([ma_phong])
REFERENCES [dbo].[phongban] ([ma_phong])
GO
ALTER TABLE [dbo].[phieuthanhly] CHECK CONSTRAINT [FK_PTL_PB]
GO
ALTER TABLE [dbo].[taisan]  WITH CHECK ADD FOREIGN KEY([ma_phong])
REFERENCES [dbo].[phongban] ([ma_phong])
GO
ALTER TABLE [dbo].[taisan]  WITH CHECK ADD  CONSTRAINT [FK_TS_LTS1] FOREIGN KEY([ma_loai])
REFERENCES [dbo].[loaitaisancodinh] ([ma_loai])
GO
ALTER TABLE [dbo].[taisan] CHECK CONSTRAINT [FK_TS_LTS1]
GO
ALTER TABLE [dbo].[taisan]  WITH CHECK ADD  CONSTRAINT [FK_TS_NCC1] FOREIGN KEY([ma_ncc])
REFERENCES [dbo].[nhacungcap] ([ma_ncc])
GO
ALTER TABLE [dbo].[taisan] CHECK CONSTRAINT [FK_TS_NCC1]
GO
ALTER TABLE [dbo].[tieuhaotaisan]  WITH CHECK ADD FOREIGN KEY([ma_loai])
REFERENCES [dbo].[loaitaisancodinh] ([ma_loai])
GO
USE [master]
GO
ALTER DATABASE [QuanLyTaiSanCong] SET  READ_WRITE 
GO
